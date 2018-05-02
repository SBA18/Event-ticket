@extends('layouts.app')

@section('content')

<div class="container"> 
    <div class="row">
        <div class="col-sm-12 col-md-12 col-lg-12">
            <h3 class="text-muted">Register paiement</h3>
            <hr class="text-muted">
            <form action="{{ route('paiements_store', $ticket->uuid) }}" method="post">
                @csrf
                <div class="form-group">
                    <label for="name">Ticket Number</label>
                    <select id="type" name="type" class="form-control" required>
                        <option selected>Choose...</option>
                            <option value="Cash">Cash</option>
                    </select>                
                </div>
                <div class="form-group">
                    <label for="name">Amount</label>
                    <input type="text" class="form-control" id="amount" name="amount" placeholder="Amount paiement" value="{{ $ticket->total_price }}" required autofocus>
                </div>
               
                <button class="btn btn-primary">Paid</button>
            </form>
        </div>
    </div>
</div>

@endsection