
{{-- tasks/index.blade.php --}}

@extends('layout')

@section('title', 'Index of tasks')

@section('page_contents')
<h1>Index of tasks</h1>
<ul>
    @foreach ($tasks as $task)
        <li>n.{{$task->id}}, name: {{$task->name}}, priority: {{$task->priority}}, related project (id): {{$task->project_id}}</li>

        <form action = '/tasks/{{ $task->id }}/edit' method = 'get'>
            <input type = 'submit' value = 'edit'>
        </form>

        <form action = '/tasks/{{ $task->id }}' method = 'get'>
            <input type = 'submit' value = 'show'>
        </form>
    @endforeach
</ul>

<br> Add new task <a href="/tasks/create">here</a>
@endsection