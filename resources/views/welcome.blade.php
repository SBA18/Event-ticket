@extends('layouts.app')


@section('content')

<div class="container">
   <div class="row">
       @foreach($events as $event)
       <div class="col-sm-12 col-md-6 col-lg-4" style="margin-bottom: 10px;">
            <div class="card">
                <div class="card-body">
                <h5 class="card-title">{{ $event->name }}</h5>
                <h6 class="card-subtitle mb-2 text-muted">{{ $event->event_type->name }} - Start {{ $event->start_at }}</h6>
                <p class="card-text">{{ $event->short_desc }}</p>
                <a href="{{ route('event_show', $event->uuid) }}" class="card-link">Learn more...</a>
                <a href="{{ route('create_ticket', $event->uuid) }}" class="card-link">Buy Ticket</a>
                </div>
            </div>
        </div>
        @endforeach
   </div>
</div>

@endsection