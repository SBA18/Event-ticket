<?php

namespace App\Http\Controllers;

use App\Paiement;
use App\Ticket;
use Illuminate\Support\Str;

use Illuminate\Http\Request;

class PaiementsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Ticket $ticket)
    {
        if(auth()->user()->isAdmin() || auth()->user()->isPos())
        {
            return view('paiements.create', compact('ticket'));

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
    public function store(Request $request, Ticket $ticket)
    {
        if(auth()->user()->isAdmin() || auth()->user()->isPos())
        {
            if($ticket->status != 1)
        {
            $this->validate(request(), [
                'type' => 'required',
                'amount' => 'required',
            ]);
    
            $paiement = Paiement::create([
                'uuid' => Str::uuid(),
                'ticket_id' => $ticket->id,
                'type' => $request->type,
                'amount' => $request->amount,
            ]);
    
            $ticket->status = "1";
    
            $ticket->update();
    
            return redirect()->route('show_ticket', $ticket);
            }else{

                echo 'Ticket already paid';
            }

        }else{
            return redirect()->back();
        }

        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Paiement  $paiement
     * @return \Illuminate\Http\Response
     */
    public function show(Paiement $paiement)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Paiement  $paiement
     * @return \Illuminate\Http\Response
     */
    public function edit(Paiement $paiement)
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
     * @param  \App\Paiement  $paiement
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Paiement $paiement)
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
     * @param  \App\Paiement  $paiement
     * @return \Illuminate\Http\Response
     */
    public function destroy(Paiement $paiement)
    {
        if(auth()->user()->isAdmin())
        {

        }else{
            return redirect()->back();
        }
    }
}
