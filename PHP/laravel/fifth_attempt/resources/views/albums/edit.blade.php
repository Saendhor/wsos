
{{-- albums/edit.blade.php --}}

@extends('layout')

@section('title', 'Edit album')

@section('page_contents')
<h1>Edit selected album ({{ $album->title }})</h1>
Edit parameters of {{ $album->title }}, id: {{ $album->id }}
<form action = '/albums/{{ $album->id }}' method = 'post'>
    @csrf
    @method('PATCH')
    <input type = 'text' name = 'title' value = {{ $album->title }}>
    <input type = 'text' name = 'artist' value = {{ $album->artist }}>
    <input type = 'submit' value = 'update'>
</form>

<form action = '/albums/{{ $album->id }}' method = 'post'>
    @csrf
    @method('DELETE')
    <input type = 'submit' value = 'destroy'>
</form>
@endsection