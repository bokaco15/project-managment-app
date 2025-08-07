@extends('Components.layout')
@section('title'){{$project->name}}@endsection
@section('content')
    <h2>{{$project->name}}</h2> <hr>
    <h4>Opis projekta:</h4>
    <p>{{$project->description}}</p> <hr>

    <h4>Project leader:</h4>
    <p>{{$project->personName}}</p> <hr>

    <h4>Project start:</h4>
    <p>{{$project->start}}</p> <hr>

    <h4>Project end:</h4>
    <p>{{$project->end}}</p> <hr>

    @php

        $status = $project->status;

        $status = match ($project->status) {
            'U toku' => 'text-primary',
            'Nije pocelo' => 'text-warning',
            'Zavrseno' => 'text-danger',
        };
    //    var_dump($status);
    @endphp

    <h4>Status: <span class="{{$status}}">{{$project->status}}</span></h4> <hr>

@endsection
