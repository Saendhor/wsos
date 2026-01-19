{{-- projects/index.blade.php --}}

@extends('layout')

@section('title', 'Project Index')

@section('page_content')
    <h1>List of projects</h1>
    @foreach ($projects as $proj)
        {{$proj->id}}, {{$proj->name}}, {{$proj->team}}, {{$proj->start_year}}
        <form action="/projects/{{$proj->id}}/edit">
        <input type="submit" value="edit">
        </form>
    <br>
@endforeach

<br>
<a href='projects/create'>Add new project</a>
@endsection
