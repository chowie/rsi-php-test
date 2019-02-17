<template>
    <div class="w-100">
        <h1 class="mb-0">Contact
            <span class="text-primary"><i class="fas fa-at"></i> Me</span>
        </h1>
        <p class="lead mb-5">
        Fill out the form, below, to contact me!
        </p>

        <div class="col-lg-9 col-xs-12">
            <div class="card">
                <div class="card-body">
                    <form id="contact-form" @submit.prevent="validateBeforeSubmit">

                        <div class="form-group" id="contact-name">
                            <label for="name">Name</label>
                            <input
                                   name="name"
                                   id="name"
                                   class="form-control"
                                   v-model="name"
                                   v-validate="'required'"
                                   type="text" form="contact-form">

                            <i v-show="errors.has('name')" class="fa fa-warning"></i>
                            <span v-show="errors.has('name')" class="help is-danger">{{ errors.first('name') }}</span>

                        </div>
                        <div class="form-group" id="contact-email">
                            <label for="email">Email</label>
                            <input
                                   name="email"
                                   id="email"
                                   class="form-control"
                                   v-model="email"
                                   v-validate="'required|email'"
                                   type="text" form="contact-form">

                            <i v-show="errors.has('email')" class="fa fa-warning"></i>
                            <span v-show="errors.has('email')" class="help is-danger">{{ errors.first('email') }}</span>

                        </div>

                        <div class="form-group" id="contact-message">
                            <label for="name">Message</label>
                            <textarea
                                   class="form-control"
                                   name="message"
                                   id="message"
                                   autocomplete="on"
                                   autocapitalize="sentences"
                                   v-model="message"
                                   v-validate="'required'"
                                   form="contact-form"
                                   rows="5"></textarea>

                            <i v-show="errors.has('message')" class="fa fa-warning"></i>
                            <span v-show="errors.has('message')" class="help is-danger">{{ errors.first('message') }}</span>

                        </div>
                        <button type="submit" class="btn btn-primary">Send message</button>
                        <div class="column is-12">
                            <p class="control">
                            <button class="button is-primary" type="submit">Submit</button>
                            </p>
                        </div>

                    </form>
                </div>
            </div>
        </div>

    </div>
</template>


<script>
export default {
    name: 'contact-form',
    data: () => ({
        name: '',
        email: '',
        message: ''
    }),
    methods: {
        validateBeforeSubmit(evt) {
            this.$validator.validateAll().then((result,evt) => {
                if (result) {
                    this.postData(evt);
                    return;
                }

            });
        },
        postData(evt) {

            axios.post('/contact', {
                name: this.name,
                email: this.email,
                message: this.message
            })
                .then( data => {
                    Event.$emit('contact-form-submitted', true);
                })
                .catch( errors => {

                    console.log('Do something with the errors.', errors);

                });

        }
    }
};
</script>


