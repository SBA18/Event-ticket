@extends('layouts.app')


@section('content')

<div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12" style="margin-bottom: 10px;">
                 <div class="card">
                     <div class="card-body">
                     <h5 class="card-title">{{ $event->name }}</h5>
                     <h6 class="card-subtitle mb-2 text-muted">Type {{ $event->event_type->name }}</h6>
                     <h6 class="card-subtitle mb-2 text-muted">Start {{ $event->start_at }}</h6>
                     <p class="card-text">{{ $event->short_desc }}</p>
                     <p class="card-text">{{ $event->long_desc }}</p>
                     <a href="{{ route('create_ticket', $event->uuid) }}" class="card-link"><i class="fas fa-dollar-sign"></i>  Buy Ticket</a>
                     </div>
                 </div>
             </div>
        </div>
     </div>

@endsection