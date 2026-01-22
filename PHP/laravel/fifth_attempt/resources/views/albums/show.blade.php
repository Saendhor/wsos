
{{-- albums/show.blade.php --}}

@extends('layout')

@section('title', 'More info')

@section('page_contents')
<h1>More info on {{ $album->title }}</h1>
Given details for the album
<ul>
    <li>Item id: {{ $album->id }}</li>
    <li>Title: {{ $album->title }}</li>
    <li>Artist {{ $album->artist }}</li>
    <li>Associated tracks:
        <ul>
            @foreach ($album->track as $track)
                <li><a href = '/tracks/{{ $track->id }}'>{{ $track->title }}</a></li>
            @endforeach
        </ul>
    </li>
    
</ul>

@endsection