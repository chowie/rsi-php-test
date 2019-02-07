@extends('layouts.master')

@section('content')

    <section class="resume-section p-3 p-lg-5 d-flex align-items-center" id="about">
        <div class="w-100">
            <h1 class="mb-0">Contact
                <span class="text-primary"><i class="fas fa-at"></i> {{$result}}</span>
            </h1>
            <p class="lead mb-5">
                We've received your message!
            </p>
        </div>
    </section>
<@endsection>
