
{{-- projects/create.blade.php --}}

@extends('layout')

@section('title', 'Create project')

@section('page_contents')
<h1>Create project</h1>
<form action = '/projects' method = 'post'>
    @csrf
    <input type = 'text' name = 'name' placeholder = 'name' required>
    <input type = 'text' name = 'team' placeholder = 'team' required>
    <input type = 'text' name = 'year' placeholder = 'year' required>
    <input type = 'submit' value = 'create'>
</form>
@endsection