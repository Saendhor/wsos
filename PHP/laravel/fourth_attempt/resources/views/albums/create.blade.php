
{{-- albums/create.blade.php --}}

@extends('layout')

@section('title', 'Available albums')

@section('page_contents')
<h1>Add new album to index</h1>
<form action = '/albums' method = 'post'>
    @csrf
    <input type = 'text' name = 'name' value = 'name' required>
    <input type = 'text' name = 'artist' value = 'artist' required>
    <input type = 'text' name = 'genre' value = 'genre' required>
    <input type = 'text' name = 'year' value = 'year' required>
    <input type = 'submit' value = 'insert new item'>
</form>
@endsection