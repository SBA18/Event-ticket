@extends('layouts.app')


@section('content')

<div class="container">
   <div class="row">
       <div class="col-sm-12 col-md-12 col-lg-12" style="margin-bottom: 10px;">
            <div class="card">
                <div class="card-body">
                <h5 class="card-title">Ticket for : {{ $event->name }} - Price : $ {{ $event->price}}</h5>
                <p class="card-text">
                    <form method="POST" action="{{ route('store_ticket', $event->uuid) }}">
                        @csrf
                        <div class="form-row">
                            <div class="form-group col-md-12">
                            <label for="inputState">Number of Persons</label>
                            <select id="persons" name="persons" class="form-control">
                                <option value="1" selected>1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                            </select>
                            </div>
                            
                        </div>
                        <button type="submit" class="btn btn-primary">Reserve</button>
                    </form>
                </p>
                </div>
            </div>
        </div>
   </div>
</div>

@endsection