@extends('layouts.app')


@section('content')

<div class="container">
    <div class="row">
        <div class="col-sm-12 col-md-12 col-lg-12">
            <h3 class="text-muted">Create new Salle</h3>
            <hr class="text-muted">
            <form method="POST" action="{{ route('salles.store') }}">
                @csrf
                <div class="form-group">
                    <label for="name">Room name</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Room name" required autofocus>
                </div>
                <div class="form-group">
                    <label for="location">Location</label>
                    <input type="text" class="form-control" id="location" name="location" placeholder="Apartment, studio, or floor" required>
                </div>
                <div class="form-row">
                    <div class="form-group col-sm-12 col-md-6 col-lg-6">
                        <label for="seats">Seats numbers</label>
                        <input type="text" class="form-control" id="seats" name="seats" placeholder="Number of seats" required>
                    </div>
                    <div class="form-group col-sm-12 col-md-6 col-lg-6">
                        <label for="status">Status</label>
                        <select class="form-control" id="status" name="status" required>
                            <option selected>Choose...</option>
                            <option value="Available">Available</option>
                            <option value="In use">In use</option>
                            <option value="In service">In service</option>
                        </select>                    
                    </div>
                </div>
                
                <button type="submit" class="btn btn-primary">Save</button>
                <a href="{{ route('salles.index')}}" class="btn btn-secondary">Back</a>
            </form>

        </div>
    </div>
</div>
@endsection