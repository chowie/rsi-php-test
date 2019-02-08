# RSI PHP Test

For the objectives of this test, see https://gist.github.com/rsimikecross/f812cca67f675c27337f33d9fad18ae7


## Setup

Run the following commands from your shell of choice:

```sh
composer install

# I built the project using yarn instead of npm
yarn install

# Build js and css assets for production. For dev environment use `dev` instead
# of `prod`
npm run prod

# Setup sqlite db and run migrations
sqlite3 database/database.sqlite
```

Check your ENV settings. The `.env` file that I used is name `.env.local` and
you will need to make a copy and call it `.env`. 

In development, I used Docker to provide a Redis server for sessions and
caching, and a MailHog server to handle email. The `docker-compose.yml` file
that I used is included in the project. 

## Mail settings

The `.env` file is used to provide from and to addresses for the notification
email. Please review the settings and make any changes that you need to have
made.

```env
MAIL_FROM_ADDRESS=no-reply@rsi-php-test.com
MAIL_FROM_NAME="Tester McTesterson"
MAIL_TO_ADDRESS=me@christopherhowie.com
MAIL_TO_NAME="Chris Howie"
```

Once you've reviewed all of the settings, complete the setup:


```sh
# Run migrations; _use `--force` if `APP_ENV` is production_
php artisan migrate
```

```sh
# Start the PHP web server
php artisan server
```




