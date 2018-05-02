@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-sm-12 col-md-12 col-lg-12">
            <h3 class="text-muted">Create Event Type</h3>
            <hr class="text-muted">
            <form method="POST" action="{{ route('types.store') }}">
                @csrf
                <div class="form-group">
                    <label for="formGroupExampleInput">Type name</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Type name" autofocus required>
                </div>
                <button type="submit" class="btn btn-primary">Save</button>
                <a href="{{ route('types.index') }}" class="btn btn-secondary">Back</a>
            </form>
        </div>
    </div>
</div>

@endsection