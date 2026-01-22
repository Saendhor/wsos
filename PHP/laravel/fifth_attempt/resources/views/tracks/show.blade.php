
{{-- tracks/show.blade.php --}}

@extends('layout')

@section('title', 'More info')

@section('page_contents')
<h1>More info on {{ $track->title }}</h1>
Given details for the track
<ul>
    <li>Item id: {{ $track->id }}</li>
    <li>Title: {{ $track->title }}</li>
    <li>Album: <a href = '/albums/{{ $track->album_id }}'>{{ $track->album->title }}</a></li>
    <li>Artist {{ $track->album->artist }}</li>
</ul>

@endsection