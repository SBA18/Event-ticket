@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-sm-12 text-right">
            <a href="{{ route('types.create') }}" class="btn btn-primary"><i class="fas fa-plus-square"></i>  Event Type</a>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12 col-md-12 col-lg-12">
            <h3 class="text-muted">Event Types</h3>
            <hr class="text-muted">
            <table class="table table-striped">
                <thead>
                    <tr>
                    <th scope="col">Name</th>
                    <th scope="col" class="text-right">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($types as $type)
                    <tr>
                    <th scope="row">{{ $type->name }}</th>
                    <td class="text-right"><a href="{{ route('types.edit', $type->id) }}"><i class="fas fa-edit"></i></a> | <a href=""><i class="fas fa-trash-alt"></i></a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
