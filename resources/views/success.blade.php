@extends('layouts.master')

@section('content')

    <section class="resume-section p-3 p-lg-5 d-flex align-items-center" id="about">
        <div class="w-100">
            <h1 class="mb-0">Contact
                <span class="text-primary"><i class="fas fa-at"></i> {{$result}}</span>
            </h1>
            <div class="subheading mb-5">We've received your message!</div>
            <p class="lead mb-5">
                Thanks for contacting us.  We love hearing from people like you!
                Right now, our award winning staff is reading your email and will
                respond to as soon as humanly possible. Although, some say we respone
                <em>inhumanly</em> fast! <i class="fas fa-robot text-info"></i>
            </p>
        </div>
    </section>
@endsection
