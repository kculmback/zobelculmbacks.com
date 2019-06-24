<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class RsvpUpdate extends Mailable
{
    use Queueable, SerializesModels;

    private $updated;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($updated)
    {
        $this->updated = $updated;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.rsvp.update')->with([
            'updated' => $this->updated,
        ]);
    }
}
