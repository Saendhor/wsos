
{{-- tracks/index.blade.php --}}

@extends('layout')

@section('title', 'Available tracks')

@section('page_contents')
<h1>Available tracks</h1>
<ul>
    @foreach ($tracks as $track)
        <li>Item number: {{ $track->id }} , 
            {{ $track->title }} , 
            {{ $track->duration_minutes }} , 
            {{ $track->album_id }}

            <form action = '/tracks/{{ $track->id }}/edit' method = 'get'>
                <input type = 'submit' value = 'edit'>
            </form>

            <form action = '/tracks/{{ $track->id }}' method = 'get'>
                <input type = 'submit' value = 'show'>
            </form>
        </li>
    @endforeach
</ul>

<br>Add a new track to the availables <a href="/tracks/create">here</a>
@endsection