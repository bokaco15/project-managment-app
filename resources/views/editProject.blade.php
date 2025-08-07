@extends('Components.layout')
@section('title')
    Add project
@endsection

@section('content')
    <h3><i>Edit {{$project->name}}</i>: </h3> <hr>

    {{--  Forma za unos projekta  --}}
    <form action="{{route('project.update', ['project'=>$project->id])}}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{$project->name}}">
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control" id="description" name="description" rows="3">{{$project->description}}</textarea>
        </div>
        <div class="mb-3">
            <select class="form-select" name="status">
                <option value="0">Select project status:</option>
                <option value="Nije pocelo" {{$project->status == 'Nije pocelo' ? 'selected' : ''}}>Nije pocelo</option>
                <option value="U toku" {{$project->status == 'U toku' ? 'selected' : ''}}>U toku</option>
                <option value="Zavrseno" {{$project->status == 'Zavrseno' ? 'selected' : ''}}>Zavrseno</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="name" class="form-label">Person name</label>
            <input type="text" class="form-control" id="name" name="personName" value="{{$project->personName}}">
        </div>
        <div class="mb-3">
            <label for="start">Datum početka:</label>
            <input type="date" id="start" name="start" value="{{$project->start}}">

            <label for="end">Datum završetka:</label>
            <input type="date" id="end" name="end" value="{{$project->end}}">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    <br>
    @if($errors->any())
        <ul>
            @foreach($errors->all() as $error)
                <li class="text-danger">{{$error}}</li>
            @endforeach
        </ul>
    @endif

@endsection
