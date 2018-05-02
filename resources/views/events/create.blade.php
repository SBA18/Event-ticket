@extends('layouts.app')


@section('content')

<div class="container">
    <div class="row">
        <div class="col-sm-12 col-md-12 col-lg-12">
            <h3 class="text-muted">Create new Event</h3>
            <hr class="text-muted">
            <form method="POST" action="{{ route('events.store') }}">
                @csrf
                <div class="form-row">
                    <div class="form-group col-md-6">
                    <label for="name">Event name</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Event name" required>
                    </div>
                    <div class="form-group col-md-6">
                    <label for="type">Event Type</label>
                    <select id="event_type_id" name="event_type_id" class="form-control" required>
                        <option selected>Choose...</option>
                        @foreach($event_types as $type)
                            <option value="{{ $type->id }}">{{ $type->name }}</option>
                        @endforeach
                    </select>                    
                </div>
                </div>
                <div class="form-group">
                    <label for="inputAddress">Salle</label>
                    <select id="type" name="salle_id" class="form-control" required>
                        <option selected>Choose...</option>
                        @foreach($salles as $salle)
                            <option value="{{ $salle->id }}">{{ $salle->name }}</option>
                        @endforeach
                    </select>
                </div>
                
                <div class="form-row">
                    <div class="form-group col-md-6">
                    <label for="start_at">Start at</label>
                    <input type="datetime" class="form-control" name="start_at" id="start_at" required>
                    </div>
                    <div class="form-group col-md-6">
                    <label for="end_at">End at</label>
                    <input type="datetime" class="form-control" name="end_at" id="end_at" required>
                    </div>
                    
                </div>
                <div class="form-group">
                    <label for="short_desc">Short description</label>
                    <textarea class="form-control" name="short_desc" id="short_desc" rows="3" required></textarea>
                </div>
                <div class="form-group">
                    <label for="long_desc">Long description</label>
                    <textarea class="form-control" name="long_desc" id="long_desc" rows="10" required></textarea>
                </div>
                <div class="form-group">
                    <label for="long_desc">Price in USD - if it's free event set the price to "0"</label>
                    <input type="text" class="form-control" name="price" id="price" required>
                </div>
                
                <button type="submit" class="btn btn-primary">Save</button>
                <a href="{{ route('events.index')}}" class="btn btn-secondary">Back</a>
            </form>

        </div>
    </div>
</div>
@endsection