
{{-- tracks/show.blade.php --}}

@extends('layout')

@section('title', 'Available albums')

@section('page_contents')
<h1>Showing track: '{{ $track->title }}'</h1>
<ul>
    <li>Item number: {{ $track->id }}</li>
    <li>Item name: {{ $track->title }}</li>
    <li>Duration: {{ $track->duration_minutes }} min(s)</li>
    <li>Album: <a href="/albums/{{ $track->album->id }}">{{ $track->album->name }}</li>
</ul>
@endsection