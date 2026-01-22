
{{-- albums/create.blade.php --}}

@extends('layout')

@section('title', 'Add album')

@section('page_contents')
<h1>Add album to index</h1>
Insert new album parameters
<form action = '/albums' method = 'post'>
    @csrf
    <input type = 'text' name = 'title' value = 'title' required>
    <input type = 'text' name = 'artist' value = 'artist' required>
    <input type = 'submit' value = 'create'>
</form>
@endsection