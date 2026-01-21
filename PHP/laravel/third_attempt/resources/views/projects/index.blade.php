
{{-- projects/index.blade.php --}}

@extends('layout')

@section('title', 'Index of projects')

@section('page_contents')
<h1>Index of projects</h1>
<ul>
    @foreach ($projects as $project)
        <li>n.{{$project->id}}, name: {{$project->name}}, team: {{$project->team}}, year: {{$project->year}}</li>

        <form action = '/projects/{{ $project->id }}/edit' method = 'get'>
            <input type = 'submit' value = 'edit'>
        </form>

        <form action = '/projects/{{ $project->id }}' method = 'get'>
            <input type = 'submit' value = 'show'>
        </form>
    @endforeach
</ul>

<br> Add new project <a href="/projects/create">here</a>
@endsection