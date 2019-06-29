<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Models\Invite;

class RsvpUpdate extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * The invite
     *
     * @var \App\Models\Invite
     */
    private $invite;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Invite $invite)
    {
        $this->invite = $invite;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.rsvp.update')->with([
            'invite' => $this->invite,
        ]);
    }
}
