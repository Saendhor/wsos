
{{-- tracks/create.blade.php --}}

@extends('layout')

@section('title', 'Add track')

@section('page_contents')
<h1>Add track to index</h1>
Insert new track parameters
<form action = '/tracks' method = 'post'>
    @csrf
    <input type = 'text' name = 'title' value = 'title' required>
    <input type = 'text' name = 'album_id' value = 'album_id' required>
    <input type = 'submit' value = 'create'>
</form>
@endsection