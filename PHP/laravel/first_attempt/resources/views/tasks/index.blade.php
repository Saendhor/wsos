{{-- task/index.blade.php --}}

@extends('layout')

@section('title', 'Task Index')

@section('page_content')
    <h1>List of tasks</h1>
    @foreach($tasks as $task)
        id: {{$task->id}}, {{$task->name}}, priority: {{$task->priority}}
        <form action="/tasks/{{$task->id}}/edit">
            <input type="submit" value="edit">
        </form>

        <form action="/tasks/{{$task->id}}">
            <input type="submit" value="show">
        </form>

        <br>
    @endforeach

<br>
<a href='tasks/create'>Add new task</a>
@endsection
