#!/bin/bash

# build-l5.sh
#
# $PACKAGE = the name of the directory containing the app
# $ENV = the name of the environment file; _e.g. boedevphplx, uatstaging, production__
# $VERSION = tag, commit, branch that you want to deploy
#
# example: `build-l5.sh elobby-pass uatstaging 1.0.2`

show_usage() {

cat <<-EndHelp

Usage: bash build.sh [-h|--help] [app_name version environment]

    Generate a tarball of an app in our GitLab repository that fully ready to deploy.

APP_NAME
    Name of the app as it will appear in the directory name. e.g. app-name, merts-unlock, eidr, etc.

VERSION
    Typically, a Semver-compliant version number is to be used, but can be any
    git ref.

    examples: 1.1.1, master, 48161aa.

ENVIRONMENT
    localdev, dev, uat, prod

EndHelp
    exit 1
}

for i in "$@"
do
    case $i in
        -h|--help)
            show_usage
            exit 0
            ;;
        *)
            # unknown option
            ;;
    esac
done

# package/folder name the project will be build in
APP=$1

# version that we are deploying
VERSION=$2

# env file to include
ENV=$3

# remember the directory we are starting from
PROJECT_DIR=$(pwd)

DIST_DIR=${PROJECT_DIR}/dist
BUILD_DIR=${PROJECT_DIR}/build

# full path and name of dist package
DIST_PACKAGE_FULL=${DIST_DIR}/${APP}.tar.gz

SOURCE_PATH=$(git remote -v | awk '$1=="origin" && $3~/fetch/ {print $2}')

# Record details of every command following this, including
# substituting the actual values for variables.
set -x or set -o xtrace

if [ -d ${DIST_DIR} ]; then
    rm -rvf ${DIST_DIR}
fi

mkdir ./dist

if [ -d ${BUILD_DIR} ]; then
    rm -rvf ${BUILD_DIR}
fi

mkdir -p ${BUILD_DIR}/${APP}

cd ${BUILD_DIR}/${APP}

#
# checkout the version that we want to deploy. The default
# directory after you cd to here is MASTER, which is probably not
# what we want to deploy
git archive --remote=${SOURCE_PATH} --format=tar ${VERSION} | tar -xf -

# remove any existing `.env` file. We will replace it with
# `.env.${ENV}`
if [ -f ${BUILD_DIR}/${APP}/.env ]; then
    rm ${BUILD_DIR}/${APP}/.env
fi

# Make the new `.env` file
if [ -f ${PROJECT_DIR}/.env.${ENV} ]; then
    cp ${PROJECT_DIR}/.env.${ENV} ./.env
fi

# Build deployable app and package into a tarball
if [ -f ./.env ]; then

    # Download Laravel app dependencies; listed in `composer.json`.
    composer install --no-dev

    php artisan vendor:publish

    # Download javascript dependencies; listed in `package.json`.
    yarn

    # Create `config/host.php` file; see `michigan-interactive/project-tools`
    #php artisan build:hostinfo

    # Create `config/version.php` file; see `michigan-interactive/project-tools`
    php artisan version:build $(git name-rev --tags --name-only $(git rev-parse $VERSION))

    # Build project assets; js, css, images, etc.
    npm run prod

    chmod -R g+w storage
    if [ $? -eq 0 ];
    then
        printf "Set group write permission for the storage directory. \n"
    else
        printf "*** FATAL ERROR: could not set storage group write permission.  App must be able to write to the storage directory.\n"
    fi

    cd ${BUILD_DIR}

    # Added package to tarball, excluding files we don’t need in the deployed
    # environment.
    tar -zcvf ${DIST_PACKAGE_FULL} \
        --exclude "${APP}/node_modules" \
        --exclude "${APP}/.env.*" \
        --exclude ".git" \
        --exclude "resources/assets" \
        ${APP}

else

    echo "No .env file. check your settings. exiting."

fi

cd ${PROJECT_DIR}
