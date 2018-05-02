@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-sm-12 col-md-12 col-lg-12">
            <form action="{{ route('checkInPost')}}" method="post">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="name">Ticket Number</label>
                    <input type="text" class="form-control" id="number" name="number" placeholder="Ticket number" required autofocus>
                </div>
                <button class="btn btn-primary btn-lg btn-block">Check In</button>
            </form>
        </div>
    </div>
</div>

@endsection