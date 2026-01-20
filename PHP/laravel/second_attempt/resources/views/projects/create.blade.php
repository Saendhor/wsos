{{-- projects/create.blade.php --}}

@extends('layout')

@section('title', 'Create project')

@section('page_contents')
    <form action = '/projects' method = 'post'>
        @csrf
        <input type = "text" name = 'name' value = 'name'>
        <input type = "text" name = 'team' value = 'team'>
        <input type = 'submit' action = 'create'>
    </form>
@endsection