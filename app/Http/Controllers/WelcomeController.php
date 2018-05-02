<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Event;

class WelcomeController extends Controller
{
    public function index()
    {
        $events = Event::orderBy('start_at')->get();

        return view('welcome', compact('events'));
    }

    public function event(Event $event)
    {
        return view('event', compact('event'));
    }
}
