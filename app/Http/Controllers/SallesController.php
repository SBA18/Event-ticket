<?php

namespace App\Http\Controllers;

use App\Salle;
use Auth;
use App\User;

use Illuminate\Support\Str;
use Illuminate\Http\Request;

class SallesController extends Controller
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
            $salles = Salle::all();
            return view('salles.index', compact('salles'));
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
        return view('salles.create');
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
                'location' => 'required',
                'seats' => 'required',
                'status' => 'required',
            ]);

            $salle = Salle::create([
                'user_id' => Auth::id(),
                'uuid' => Str::uuid(),
                'name' => $request->name,
                'location' => $request->location,
                'seats' => $request->seats,
                'status' => $request->status,
            ]);
            
            return redirect()->back();
        }else{
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Salle  $salle
     * @return \Illuminate\Http\Response
     */
    public function show(Salle $salle)
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
     * @param  \App\Salle  $salle
     * @return \Illuminate\Http\Response
     */
    public function edit(Salle $salle)
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
     * @param  \App\Salle  $salle
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Salle $salle)
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
     * @param  \App\Salle  $salle
     * @return \Illuminate\Http\Response
     */
    public function destroy(Salle $salle)
    {
        if(auth()->user()->isAdmin())
        {

        }else{
            return redirect()->back();
        }
    }
}
