{{-- tasks/create.blade.php --}}

@extends('layout')

@section('title', 'Create')

@section('page_content')
    <h1>Insert into tasks</h1>
    <form method="POST" action="/tasks">
        @csrf
        <input type="text" name="name" placeholder="Task name">
        <input type="text" name="priority" placeholder="Task priority">
        <input type="text" name="project_id" placeholder="Relative project">
        <input type="submit" action="create" value="create">
    </form>
@endsection
