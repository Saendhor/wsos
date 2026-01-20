{{-- projects/show.blade.php --}}

@extends('layout')

@section('title', 'Tasks for project')

@section('page_content')
<h1>Project {{$project->id}}</h1>
    <b>Name:</b> {{$project->name}} <br>
    <b>Team:</b> {{$project->team}} <br>
    <b>Year:</b> {{$project->start_year}} <br>
    <b>Associated tasks:</b><BR>

    @if ($project->tasks->count())
        <ul>
            @foreach ($project->tasks as $task)
                <li> {{$task->id}}, {{$task->name}}, {{$task->priority}}, {{$task->project_id}} </li>
            @endforeach
        </ul>
    @endif
@endsection