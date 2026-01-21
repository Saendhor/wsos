
{{-- projects/show.blade.php --}}

@extends('layout')

@section('title', 'Show project')

@section('page_contents')
<h1>Show project</h1>
<ul>
    <li>Name: {{ $project->name }}</li>
    <li>Team: {{ $project->team }}</li>
    <li>Year: {{ $project->year }}</li>
    <li>List of associated tasks:
        <ul>
            @foreach ($project->tasks as $task)
                <li><a href="/tasks/{{ $task->id }}">{{ $task->name }}</a></li>
            @endforeach
        </ul>
    </li>
</ul>

@endsection