@extends('layouts.app')


@section('content')

<div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12" style="margin-bottom: 10px;">
                 <div class="card">
                     <div class="card-body">
                     <h5 class="card-title"><strong>Ticket : #{{ $ticket->number }} | Event : {{ $ticket->event->name }}</strong></h5>
                     <h6 class="card-subtitle mb-2 text-muted">Event starts at :  {{ $ticket->event->start_at }}</h6>
                     <p class="card-text">Number off person(s) : {{ $ticket->persons }}</p>
                     <p class="card-text">Total price : ${{ $ticket->total_price }}</p>
                     <p class="card-text">Event description : {{ $ticket->event->short_desc }}</p>
                     <p>{!! \Milon\Barcode\DNS1D::getBarcodeHTML($ticket->number, "C128") !!}</p>
                     <hr>
                     <h6 class="card-subtitle mb-2 text-muted">Ticket status :  
                         @if($ticket->status === 0)
                            <span>Reserved - Unpaid</span>
                        @else
                        <span>Fully paid</span>
                        @endif
                     </h6>
                     <hr>
                     <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Eos earum culpa fuga dolor perspiciatis incidunt numquam explicabo consequuntur nostrum ducimus.</p>
                     @if($ticket->status != 1)
                     @if(Auth::user()->isAdmin() || Auth::user()->isPos())
                     <a class=" btn btn-primary" href="{{ route('showPaiementForm', $ticket->uuid) }}"><i class="fas fa-dollar-sign"></i>  Register paiment</a> | <a class=" btn btn-danger" href=""><i class="fas fa-ban"></i>  Cancel reservation</a>
                     @endif
                     @endif
                     </div>
                 </div>
             </div>
        </div>
     </div>

@endsection