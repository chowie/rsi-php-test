<?php

namespace App\Listeners;

use App\Events\MessageCreate;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendContactMessage
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle(MessageCreated $event)
    {
        dd($event);
        Mail::to($request->user())->send(new SendContactMessageEmail($message));
    }
}
