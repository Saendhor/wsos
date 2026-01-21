
{{-- tracks/create.blade.php --}}

@extends('layout')

@section('title', 'Add track')

@section('page_contents')
<h1>Add new album to index</h1>
<form action = '/tracks' method = 'post'>
    @csrf
    <input type = 'text' name = 'title' value = 'title' required>
    <input type = 'text' name = 'duration_minutes' value = 'duration_minutes'>
    <input type = 'text' name = 'album_id' value = 'album_id'>
    <input type = 'submit' value = 'insert new item'>
</form>
@endsection