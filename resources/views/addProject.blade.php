@extends('Components.layout')
@section('title')
    Add project
@endsection

@section('content')
    <h3>Add project: </h3> <hr>

{{--  Forma za unos projekta  --}}
    <form action="{{route('project.add')}}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{old('name')}}">
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control" id="description" name="description" rows="3">{{old('description')}}</textarea>
        </div>
        <div class="mb-3">
            <select class="form-select" name="status">
                <option value="0">Select project status:</option>
                <option value="Nije pocelo" {{old('status') == 'Nije pocelo' ? 'selected' : ''}}>Nije pocelo</option>
                <option value="U toku" {{old('status') == 'U toku' ? 'selected' : ''}}>U toku</option>
                <option value="Zavrseno" {{old('status') == 'Zavrseno' ? 'selected' : ''}}>Zavrseno</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="name" class="form-label">Person name</label>
            <input type="text" class="form-control" id="name" name="personName" value="{{old('personName')}}">
        </div>
        <div class="mb-3">
            <label for="start">Datum početka:</label>
            <input type="date" id="start" name="start" value="{{old('start')}}">

            <label for="end">Datum završetka:</label>
            <input type="date" id="end" name="end" value="{{old('end')}}">
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
    {!!session('success') ? '<p class="text-success">'.session('success').'</p>' : '' !!}

@endsection
