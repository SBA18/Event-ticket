<?php

namespace App\Http\Controllers;

use App\Ticket;
use App\Event;
use Auth;
use Milon\Barcode\DNS1D;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class TicketsController extends Controller
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
        if(auth()->user()->isAdmin() || auth()->user()->isPos())
        {
            $tickets = Ticket::latest()->get();
            return view('tickets.index', compact('tickets'));
        }else{
            return redirect()->back();
        }
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Event $event)
    {
        return view('tickets.create', compact('event'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Event $event)
    {
        $this->validate(request(), [
            'persons' => 'required',
        ]);

        $ticket = Ticket::create([
            'user_id' => Auth::id(),
            'uuid' => Str::uuid(),
            'number' => mt_rand(). date("His"),
            'event_id' => $event->id,
            'persons' => $request->persons,
            'total_price' => $event->price * $request->persons,
        ]);

        return redirect()->route('show_ticket', $ticket);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function show(Ticket $ticket)
    {
        return view('tickets.show', compact('ticket'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function edit(Ticket $ticket)
    {
        if(auth()->user()->isAdmin())
        {
            return view('events.show', compact('event'));
        }else{
            return redirect()->back();
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ticket $ticket)
    {
        if(auth()->user()->isAdmin())
        {
            return view('events.show', compact('event'));
        }else{
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ticket $ticket)
    {
        if(auth()->user()->isAdmin())
        {
            return view('events.show', compact('event'));
        }else{
            return redirect()->back();
        }
    }

    public function checkIn()
    {
        if(auth()->user()->isAdmin() || auth()->user()->isPos())
        {
             return view('pos.checkin');
        }else{
            return redirect()->back();
        }
       
    }

    public function checkInPost(Request $request)
    {
        if(auth()->user()->isAdmin() || auth()->user()->isPos())
        {
            $this->validate(request(), [
                'number' => 'required',
            ]);
    
            $ticket = Ticket::where('number', $request->number)->first();
    
            // dd($ticket->number);
    
            if($ticket->status === 1 && $ticket->checkin === 0)
            {
    
                $ticket->checkin = "1";
    
                $ticket->update();
    
                return redirect()->back();
    
            }else{ 
                echo 'The ticket is Unpaid ticket Or Invalid ticket';
            }
        }else{
            return redirect()->back();
        }
        

      
    }
}
