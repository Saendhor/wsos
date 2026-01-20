{{-- tasks/show.blade.php --}}

@extends('layout')

@php
    use App\Models\Project;
    $project = Project::findOrFail($task->project_id);
    //<b>FROM PROJECT:</b> <a href="/projects/{{$project->id}}">{{$project->name}}</a> <br>
@endphp

@section('page_content')
    <h1>Task {{$task->id}}</h1>
    <b>Name:</b> {{$task->name}} <br>
    <b>from project:</b> <a href="/projects/{{$task->project->id}}">{{$task->project->name}}</a> <br><br>
    <form action="/tasks/{{$task->id}}/edit" method="get">
        <input type="submit" value="Edit/Delete Task">
    </form>
@endsection
