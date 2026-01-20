{{-- tasks/edit.blade.php --}}

@extends('layout')

@section('title', 'Edit task')

@section('page_contents')
<h1>Editing project id: {{ $task->id }}</h1>
<form action = '/tasks/{{ $task->id }}' method = 'post'>
    @csrf
    @method('PATCH')
    <input type = 'text' name = 'name' value = '{{ $task->name }}'>
    <input type = 'text' name = 'priority' value = '{{ $task->priority }}'>
    <input type = 'text' name = 'project_id' value = '{{ $task->project_id }}'>
    <input type = 'submit' value = 'update'>
</form>

<form action = '/tasks/{{ $task->id }}' method = 'post'>
    @csrf
    @method('DELETE')
    <input type = 'submit' value = 'delete'>
</form>

@endsection