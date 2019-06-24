<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Invite;
use App\Models\User;
use App\Mail\RsvpUpdate as RsvpUpdateMail;

class RsvpUpdate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'rsvp:update';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send email with latest RSVPs';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $closure = function ($query) {
            $query->updatedPastWeek();
        };
        $updated = Invite::whereHas('guests', $closure)
            ->with(['guests' => $closure])
            ->get();
        \Mail::to(User::all())->send(new RsvpUpdateMail($updated));
    }
}
