<?php

namespace App\Http\Controllers\API;

use App\Events\API\SendTestEvent;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EventsController extends Controller
{
    public function send()
    {
        event(new SendTestEvent(auth()->user()));
    }
}
