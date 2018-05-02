@extends('layouts.app')

@section('custom_css')
<style>
    th{
        width: 200px;
    }
</style>
@endsection

@section('content')

<div class="container">
    <div class="row">
        <div class="col-sm-12 col-md-12 col-lg-12">
            <h3 class="text-muted">Event : {{ $event->name }}</h3>
            <hr class="text-muted">
            
            <table class="table table-striped">
         
                <tbody>
                    <tr>
                        <th>Number ID : </th>
                        <td class="align-left">{{ $event->number }}</td>
                    </tr>
                    <tr>
                        <th>Name : </th>
                        <td class="align-left">{{ $event->name }}</td>
                    </tr>
                    <tr>
                        <th>Type : </th>
                        <td>{{ $event->event_type->name }}</td>
                    </tr>
                    <tr>
                        <th>Salle : </th>
                        <td>{{ $event->salle->name }}</td>
                    </tr>
                    <tr>
                        <th>Start at : </th>
                        <td>{{ $event->start_at }}</td>
                    </tr>
                    <tr>
                        <th>End at : </th>
                        <td>{{ $event->end_at }}</td>
                    </tr>
                    <tr>
                        <th>Short description : </th>
                        <td>{{ $event->short_desc }}</td>
                    </tr>
                    <tr>
                        <th>Long description : </th>
                        <td>{{ $event->long_desc }}</td>
                    </tr>
                    <tr>
                        <th>Price : </th>
                        <td>$ {{ $event->price }}</td>
                    </tr>
                    <tr>
                        <th>Created at : </th>
                        <td>{{ $event->created_at }}</td>
                    </tr>
                    <tr>
                        <th>Created by : </th>
                        <td>{{ $event->user->name }}</td>
                    </tr>
                    <tr>
                        <th>Actions : </th>
                        <td class="text-right"><a href="{{ route('events.edit', $event->uuid)}}"><i class="fas fa-edit"></i></a> | <a href=""><i class="fas fa-trash-alt"></i></a></td>
                    </tr>
                </tbody>
            </table>

        </div>
    </div>
</div>
@endsection