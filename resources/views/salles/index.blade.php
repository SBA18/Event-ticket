@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-sm-12 text-right">
            <a href="{{ route('salles.create') }}" class="btn btn-primary"><i class="fas fa-plus-square"></i>  Salle</a>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12 col-md-12 col-lg-12">
            <h3 class="text-muted">Salle list</h3>
            <hr class="text-muted">
            <table class="table table-striped">
                <thead>
                    <tr>
                    <th scope="col">Name</th>
                    <th scope="col">location</th>
                    <th scope="col">Seats</th>
                    <th scope="col">Status</th>
                    <th scope="col" class="text-right">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($salles as $salle)
                    <tr>
                    <th scope="row">{{ $salle->name }}</th>
                    <td>{{ $salle->location }}</td>
                    <td>{{ $salle->seats }}</td>
                    <td>{{ $salle->status }}</td>
                    <td class="text-right"><a href=""><i class="fas fa-edit"></i></a> | <a href=""><i class="fas fa-trash-alt"></i></a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
