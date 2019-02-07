@component('mail::message')
# You have received a message from someone, somewhere in the cloud

Message received from: {{ $message->name }},

## Their Message

{{ $message->message }}

You can reply to them at  {{ $message->email }}

Thanks,<br>
{{ config('app.name') }}
@endcomponent
