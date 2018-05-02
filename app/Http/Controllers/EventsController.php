<?php

namespace App\Http\Controllers;

use App\Event;
use App\Salle;
use App\EventType;
use Auth;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class EventsController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $events = Event::all();
        
        return view('events.index', compact('events'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(auth()->user()->isAdmin())
        {
            $salles = Salle::all();

            $event_types = EventType::all();
    
            return view('events.create', compact('salles', 'event_types'));

        }else{
            return redirect()->back();
        }
       
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(auth()->user()->isAdmin())
        {
            $this->validate(request(), [
                'name' => 'required',
                'event_type_id' => 'required',
                'salle_id' => 'required',
                'start_at' => 'required',
                'end_at' => 'required',
                'short_desc' => 'required',
                'price' => 'required',
            ]);
    
            $event = Event::create([
                'user_id' => Auth::id(),
                'uuid' => Str::uuid(),
                'number' => mt_rand(),
                'name' => $request->name,
                'event_type_id' => $request->event_type_id,
                'salle_id' => $request->salle_id,
                'start_at' => $request->start_at,
                'end_at' => $request->end_at,
                'short_desc' => $request->short_desc,
                'long_desc' => $request->long_desc,
                'price' => $request->price,
            ]);
    
            return redirect()->route('events.show', $event);
        }else{
            return redirect()->back();
        }

        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function show(Event $event)
    {
        if(auth()->user()->isAdmin())
        {
            return view('events.show', compact('event'));
        }else{
            return redirect()->back();
        }
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function edit(Event $event)
    {
        if(auth()->user()->isAdmin())
        {

        }else{
            return redirect()->back();
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Event $event)
    {
        if(auth()->user()->isAdmin())
        {

        }else{
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function destroy(Event $event)
    {
        if(auth()->user()->isAdmin())
        {

        }else{
            return redirect()->back();
        }
    }
}
