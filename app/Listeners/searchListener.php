<?php

namespace App\Listeners;

use App\Models\question;
use App\Events\searchRequestEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Request;

class searchListener
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(searchRequestEvent $event): void
    {
       dd(question::search($event->request)->get());
    }
}
