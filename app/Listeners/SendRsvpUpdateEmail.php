<?php

namespace App\Listeners;

use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Events\Rsvp;
use App\Mail\RsvpUpdate;
use App\Models\User;

class SendRsvpUpdateEmail
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
    public function handle(Rsvp $event)
    {
        \Mail::to(User::where('email', 'kasey.culmback@gmail.com')->get())->send(new RsvpUpdate($event->invite));
    }
}
