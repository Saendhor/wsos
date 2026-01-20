{{-- tasks/index.blade.php --}}

@extends('layout')

@section('title', 'Tasks index')

@section('page_contents')
<h1>Index of tasks</h1>
<ul>
    @foreach ($tasks as $task)
        <li>id: {{ $task->id }}, name: {{ $task->name }}, priority:{{ $task->priority }}, associated project: {{ $task->project_id }}</li>
    <form action = 'tasks/{{ $task->id }}/edit' method = 'get'>
            <input type = 'submit' value = 'edit'>
        </form>

        <form action = 'tasks/{{ $task->id }}' method = 'get'>
            <input type = 'submit' value = 'show'>
        </form>
    @endforeach
</ul>

<br>
<a href="/tasks/create">Add your task!</a><br>
@endsection