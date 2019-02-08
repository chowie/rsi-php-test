@extends('layouts.master')

@section('content')
    <section class="resume-section p-3 p-lg-5 d-flex align-items-center" id="contact">
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
                        <form method="POST" action="/contact" id="contact-form">
                            @csrf

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
                                       required
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
    </section>
@endsection
