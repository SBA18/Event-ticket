@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-sm-12 text-right">
            <a href="{{ route('events.create') }}" class="btn btn-primary"><i class="fas fa-plus-square"></i>  Event</a>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12 col-md-12 col-lg-12">
            <h3 class="text-muted">Events list</h3>
            <hr class="text-muted">
            <table class="table table-striped">
                <thead>
                    <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Type</th>
                    <th scope="col">Salle</th>
                    <th scope="col">Start at</th>
                    <th scope="col">End at</th>
                    <th scope="col">Price in USD</th>
                    <th scope="col" class="text-right">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($events as $event)
                    <tr>
                    <th scope="row">{{ $event->number}}</th>
                    <td><a href="{{ route('events.show', $event->uuid)}}">{{ $event->name}}</a></td>
                    <td>{{ $event->event_type->name}}</td>
                    <td>{{ $event->salle->name}}</td>
                    <td>{{ $event->start_at}}</td>
                    <td>{{ $event->end_at}}</td>                    
                    <td>${{ $event->price}}</td>                    
                    <td class="text-right"><a href="{{ route('events.edit', $event->uuid)}}"><i class="fas fa-edit"></i></a> | <a href=""><i class="fas fa-trash-alt"></i></a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
