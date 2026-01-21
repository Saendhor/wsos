
{{-- tasks/create.blade.php --}}

@extends('layout')

@section('title', 'Create task')

@section('page_contents')
<h1>Create task</h1>

<form action = '/tasks' method = 'post'>
    @csrf
    <input type = 'text' name = 'name' placeholder = 'name' required>
    <input type = 'text' name = 'priority' placeholder = 'priority' required>
    <input type = 'text' name = 'project_id' placeholder = 'project_id' required>
    <input type = 'submit' value = 'create'>
</form>

@endsection