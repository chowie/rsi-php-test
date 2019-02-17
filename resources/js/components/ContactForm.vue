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
                    <form method="POST" action="/contact" id="contact-form" @submit.prevent="validateBeforeSubmit">
                        @csrf

                        <div class="form-group" id="contact-name">
                            <label for="name">{{ title_case($name) }}</label>
                            <input
                                   name="name"
                                   id="name"
                                   class="form-control"
                                   v-model="name"
                                   v-validate="'required'"
                                   type="{{$type ?? 'text'}}" form="contact-form">

                                   @component('components.contact-invalid-feedback', [ 'name' => $name ]) @endcomponent

                        </div>
                        @component('components.contact-input', [ 'name' => 'name' ]) @endcomponent

                        @component('components.contact-input', ['type' => 'email', 'name' => 'email']) @endcomponent

                        <div class="form-group" id="contact-message">
                            <label for="name">Message</label>
                            <textarea
                                   class="form-control{{ $errors->has('message') ? ' is-invalid' : '' }}"
                                   name="message"
                                   id="message"
                                   autocomplete="on"
                                   autocapitalize="sentences"
                                   v-model="message"
                                   v-validate="'required'"
                                   form="contact-form"
                                   rows="5"></textarea>

                            @component('components.contact-invalid-feedback', [ 'name' => 'message' ]) @endcomponent

                        </div>
                        <button type="submit" class="btn btn-primary">Send message</button>

                    </form>
                </div>
            </div>
        </div>

    </div>
</template>


<script>
export default {

    props: [
        'progress'
    ],

    data () {

        return {
            contactInfo: false
        };

    },

    methods: {
        emit() {
            this.$emit('submit_contact_info',1);
        }
    }

}
</script>

<style>


