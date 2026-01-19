{{-- edit.blade.php --}}

@extends('layout')

@section('title', 'Edit')

@section('page_content')
    <form action='/projects/{{ $project->id }}' method = 'post'>
        @csrf
        @method('PATCH')
        Nome <input type = 'text' name = 'name' value = {{$project->name}}>
        Team <input type = 'text' name = 'team' value = {{$project->team}}>
        Year <input type = 'text' name = 'start_year' value = {{$project->start_year}}>
        <button type = 'submit' name = 'action' value = 'update'> Modifica </button> 
    </form>

    <br>
    <form action='/projects/{{ $project->id }}' method = 'post'>
        @csrf
        @method('DELETE')
        <input type = 'submit' value = 'delete'>
    </form>

@endsection