{{-- projects/index.blade.php --}}

@extends('layout')

@section('title', 'Projects index')

@section('page_contents')
<h1>Index of projects</h1>
<ul>
    @foreach ($projects as $project)
        <li>id: {{ $project->id }}, name: {{ $project->name }}, team:{{ $project->team }}</li>
        <form action = 'projects/{{ $project->id }}/edit' method = 'get'>
            <input type = 'submit' value = 'edit'>
        </form>

        <form action = 'projects/{{ $project->id }}' method = 'get'>
            <input type = 'submit' value = 'show'>
        </form>
    @endforeach
</ul>

<br>
<a href="/projects/create">Add your project!</a><br>
@endsection