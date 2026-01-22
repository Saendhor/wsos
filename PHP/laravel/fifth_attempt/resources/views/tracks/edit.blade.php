
{{-- tracks/edit.blade.php --}}

@extends('layout')

@section('title', 'Edit track')

@section('page_contents')
<h1>Edit selected track ({{ $track->title }})</h1>
Edit parameters of {{ $track->title }}, id: {{ $track->id }}
<form action = '/tracks/{{ $track->id }}' method = 'post'>
    @csrf
    @method('PATCH')
    <input type = 'text' name = 'title' value = {{ $track->title }}>
    <input type = 'text' name = 'album_id' value = {{ $track->album_id }}>
    <input type = 'submit' value = 'update'>
</form>

<form action = '/tracks/{{ $track->id }}' method = 'post'>
    @csrf
    @method('DELETE')
    <input type = 'submit' value = 'destroy'>
</form>
@endsection