{{-- projects/show.blade.php --}}

@extends('layout')

@section('title', 'Show project')

@section('page_contents')
<h1>Showing project id: {{ $project->id }}</h1>
<ul>
    <li>Name: {{ $project->name }}</li>
    <li>Team: {{ $project->team }}</li>
    <li>Associated tasks:
        <ul>
            @foreach ($project->tasks as $task)
                <li>{{ $task->name }}, priority: {{ $task->priority }}</li>
            @endforeach
        </ul>
    </li>
</ul>

@endsection