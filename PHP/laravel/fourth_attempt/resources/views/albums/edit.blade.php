
{{-- albums/edit.blade.php --}}

@extends('layout')

@section('title', 'Edit album')

@section('page_contents')
<h1>Edit album with id: {{ $album->id }}</h1>
<form action = '/albums/{{ $album->id }}' method = 'post'>
    @csrf
    @method('PATCH')
    <input type = 'text' name = 'name' value = {{ $album->name }}>
    <input type = 'text' name = 'artist' value = {{ $album->artist }}>
    <input type = 'text' name = 'genre' value =  {{ $album->genre }}>
    <input type = 'text' name = 'year' value =  {{ $album->year }}>
    <input type = 'submit' value = 'update'>
</form>

<form action = '/albums/{{ $album->id }}' method = 'post'>
    @csrf
    @method('DELETE')
    <input type = 'submit' value = 'delete'>
</form>
@endsection