
{{-- albums/show.blade.php --}}

@extends('layout')

@section('title', 'Available albums')

@section('page_contents')
<h1>Showing album: '{{ $album->name }}'</h1>
<ul>
    <li>Item number: {{ $album->id }}</li>
    <li>Item name: {{ $album->name }}</li>
    <li>Artist(s): {{ $album->artist }}</li>
    <li>Music genre: {{ $album->genre }}</li>
    <li>Release year: {{ $album->year }}</li>
    <li>Tracklist:
        <ul>
            @foreach ($album->track as $track)
                <li>{{ $track->id }} , 
                    {{ $track->title }} , 
                    {{ $track->duration_minutes }} min
                </li>
            @endforeach
        </ul> 
    </li>
</ul>
@endsection