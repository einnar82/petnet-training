<?php

namespace App\Listeners\API;

use App\Events\API\SendTestEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendTestListener implements ShouldQueue
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
     * @param  SendTestEvent  $event
     * @return void
     */
    public function handle(SendTestEvent $event)
    {
        \Log::info('Current user', ['user' => $event->user]);
    }
}
