<?php

namespace App\Listeners;

use App\Events\SendMail;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\User;

use Mail;
use Auth;


class SendMailFired
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
     * @param  SendMail  $event
     * @return void
     */
    public function handle(SendMail $event)
    {
        $user = Auth::user();
        $u['email'] = Auth::user()->email;

        Mail::send('emails.mailEvent', $u, function($message) use ($user) {

            $message->to($user['email']);

            $message->subject('Event Testing');

        });
        //
    }
}
