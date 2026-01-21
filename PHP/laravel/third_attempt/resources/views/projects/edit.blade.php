
{{-- projects/edit.blade.php --}}

@extends('layout')

@section('title', 'Edit project')

@section('page_contents')
<h1>Edit project</h1>

<form action = '/projects/{{ $project->id }}' method = 'post'>
    @csrf
    @method('PATCH')
    <input type = 'text' name = 'name' value = '{{ $project->name }}' required>
    <input type = 'text' name = 'team' value = '{{ $project->team }}' required>
    <input type = 'text' name = 'year' value = '{{ $project->year }}' required>
    <input type = 'submit' value = 'update'>
</form>

<form action = '/projects/{{ $project->id }}' method = 'post'>
    @csrf
    @method('DELETE')
    <input type = 'submit' value = 'delete'>
</form>

@endsection