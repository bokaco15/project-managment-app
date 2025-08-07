@extends('Components.layout')

@section('title')
    Home
@endsection

@section('content')

    <h2 class="text-center">All projects</h2>
    <hr class="mb-3">

    <table class="table table-striped text-center">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Project name</th>
            <th scope="col">Description</th>
            <th scope="col">Status</th>
            <th scope="col">Name and Surname</th>
            <th scope="col">Start</th>
            <th scope="col">End</th>
            <th scope="col">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($projects as $project)
            <tr>
                <th scope="row">{{$project->id}}</th>
                <td>{{$project->name}}</td>
                <td>{{Str::words($project->description, 5,'...')}}</td>
                <td>{{$project->status}}</td>
                <td>{{$project->personName}}</td>
                <td>{{$project->start}}</td>
                <td>{{$project->end}}</td>
                <td>
                    <a href="{{route('project.show', ['project'=>$project->id])}}" class="btn btn-primary btn-sm">Show</a>
                    <a href="/" class="btn btn-secondary btn-sm">Edit</a>
                    <a href="/" class="btn btn-danger btn-sm">Delete</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

@endsection

