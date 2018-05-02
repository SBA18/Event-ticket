<?php

namespace App\Http\Controllers;

use App\EventType;
use Auth;
use Illuminate\Http\Request;

class EventTypesController extends Controller
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
        if(auth()->user()->isAdmin())
        {
            $types = EventType::all();
        
            return view('types.index', compact('types'));

        }else{
            return redirect()->back();
        }
        
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
            return view('types.create');
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
            ]);
    
            $type = EventType::create([
                'user_id' => Auth::id(),
                'name' => $request->name,
            ]);
    
            return redirect()->route('types.index');
            
        }else{
            return redirect()->back();
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\EventType  $eventType
     * @return \Illuminate\Http\Response
     */
    public function show(EventType $eventType)
    {
        if(auth()->user()->isAdmin())
        {

        }else{
            return redirect()->back();
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\EventType  $eventType
     * @return \Illuminate\Http\Response
     */
    public function edit(EventType $eventType)
    {
        if(auth()->user()->isAdmin())
        {
            // dd($eventType);
            return view('types.edit', compact('eventType'));

        }else{
            return redirect()->back();
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\EventType  $eventType
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, EventType $eventType)
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
     * @param  \App\EventType  $eventType
     * @return \Illuminate\Http\Response
     */
    public function destroy(EventType $eventType)
    {
        if(auth()->user()->isAdmin())
        {

        }else{
            return redirect()->back();
        }
    }
}
