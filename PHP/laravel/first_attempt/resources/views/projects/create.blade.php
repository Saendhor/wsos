{{-- projects/create.blade.php --}}

@extends('layout')

@section('title', 'Create')

@section('page_content')
    <h1>Insert into projects</h1>
    <form method="POST" action="/projects">
    @csrf
    <input type="text" name="name" placeholder="Project name">
    <input type="text" name="team" placeholder="Project team">
    <input type="text" name="start_year" placeholder="start year">
    <input type="submit" action="create" value="create">
    </form>
@endsection
