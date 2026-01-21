
{{-- tasks/show.blade.php --}}

@extends('layout')

@section('title', 'Show task')

@section('page_contents')
<h1>Show task</h1>
<ul>
    <li>Name: {{ $task->name }}</li>
    <li>Priority: {{ $task->priority }} (on a scale from 1 to 7)</li>
    <li>Associated project (id: {{$task->project->id}}): <a href="/projects/{{ $task->project->id }}">{{ $task->project->name }}</a></li>
</ul>
@endsection