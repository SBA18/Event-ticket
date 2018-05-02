@extends('layouts.app')

@section('content')

<div class="container">
    
    <div class="row">
        <div class="col-sm-12 col-md-12 col-lg-12">
            <h3 class="text-muted"><i class="fas fa-ticket-alt"></i>  Tickets</h3>
            <hr class="text-muted">
            <table class="table table-striped">
                <thead>
                    <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Event</th>
                    <th scope="col">Person(s)</th>
                    <th scope="col">Reserved by</th>
                    <th scope="col">Total price</th>
                    <th scope="col">Status</th>
                    <th scope="col">Check In</th>
                    <th scope="col" class="text-right">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($tickets as $ticket)
                    <tr>
                    <th scope="row"><a href="{{ route('show_ticket', $ticket->uuid) }}">{{ $ticket->number}}</a> </th>
                    <td><a href="{{ route('events.show', $ticket->event->uuid)}}">{{ str_limit($ticket->event->name, 20)}}</a></td>
                    <td>{{ $ticket->persons}}</td>
                    <td>{{ $ticket->user->name}}</td>
                    <td>{{ $ticket->total_price}}</td>
                    @if($ticket->status === 0)
                    <td class="alert alert-warning">Unpaid</td>
                    @else
                    <td class="alert alert-info">Paid</td>
                    @endif

                    @if($ticket->checkin === 0)
                    <td class="alert alert-warning">Out</td>
                    @else
                    <td class="alert alert-info">In</td>
                    @endif
                    <td class="text-right" ><a class="btn btn-primary" href="{{ route('showPaiementForm', $ticket->uuid) }}"><i class="fas fa-dollar-sign"></i></a> | <a class="btn btn-warning" href=""><i class="fas fa-ban"></i></a>
                        @if(Auth::user()->isAdmin())
                         | <a class="btn btn-danger" href=""><i class="fas fa-trash-alt"></i></a></td>
                        @endif
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
