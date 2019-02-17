@extends('layouts.master')

@section('content')
    <section class="resume-section p-3 p-lg-5 d-flex align-items-center" id="contact">
        <div id="app" class="w-100">
            <contact-form v-show="!submitted"></contact-form>
            <success v-show="submitted"></success>
        </div>
    </section>
@endsection
