{{-- tasks/show.blade.php --}}

@extends('layout')

@section('title', 'Show task')

@php
    use App\Models\Project;
    $project = Project::findOrFail($task->project_id);
    //<b>FROM PROJECT:</b> <a href="/projects/{{$project->id}}">{{$project->name}}</a> <br>
@endphp

@section('page_contents')
<h1>Showing task id: {{ $task->id }}</h1>
<ul>
    <li>Name: {{ $task->name }}</li>
    <li>Priority: {{ $task->priority }}</li>
    <li>Associated project: <a href="/projects/{{$task->project->id}}">{{$task->project->name}}</a> </li>
</ul>

@endsection