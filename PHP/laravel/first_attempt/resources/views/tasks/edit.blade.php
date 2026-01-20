{{-- tasks/edit.blade.php --}}

@extends('layout')

@section('title', 'Edit')

@section('page_content')
    <form action='/tasks/{{ $task->id }}' method = 'post'>
        @csrf
        @method('PATCH')
        Name <input type = 'text' name = 'name' value = {{$task->name}}>
        Priority <input type = 'text' name = 'priority' value = {{$task->priority}}>
        Project id <input type = 'text' name = 'project_id' value = {{$task->project_id}}>
        <button type = 'submit' name = 'action' value = 'update'> Modify </button> 
    </form>

    <br>
    <form action='/tasks/{{ $task->id }}' method = 'post'>
        @csrf
        @method('DELETE')
        <input type = 'submit' value = 'delete'>
    </form>

@endsection