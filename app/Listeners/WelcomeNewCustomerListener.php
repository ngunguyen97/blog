<?php

namespace App\Listeners;

use App\Mail\WelcomeUserMail;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;


class WelcomeNewCustomerListener implements ShouldQueue
{

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        Mail::to($event->customer->email)->send(new WelcomeUserMail());
    }
}
