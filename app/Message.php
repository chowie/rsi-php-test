<?php

namespace App;

use App\Events\MessageCreated;
use App\Mail\SendContactMessageEmail;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Message extends Model
{

    use Notifiable;

    protected $fillable = [
        'name',
        'email',
        'message'
    ];

    protected $dispatchesEvents = [
        'created' => MessageCreated::class,
    ];

}
