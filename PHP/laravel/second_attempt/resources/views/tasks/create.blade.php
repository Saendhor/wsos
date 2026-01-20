{{-- tasks/create.blade.php --}}

@extends('layout')

@section('title', 'Create task')

@section('page_contents')
    <form action = '/tasks' method = 'post'>
        @csrf
        <input type = "text" name = 'name' value = 'name'>
        <input type = "text" name = 'priority' value = 'priority'>
        <input type = "text" name = 'project_id' value = 'project_id'>
        <input type = 'submit' action = 'create'>
    </form>
@endsection