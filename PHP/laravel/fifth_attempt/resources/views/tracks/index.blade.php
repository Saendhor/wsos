
{{-- tracks/index.blade.php --}}

@extends('layout')

@section('title', 'Track index')

@section('page_contents')
<h1>Track index</h1>
Here is the list of available tracks:
<ul>
    @foreach ($tracks as $track)
        <li>
            Item id {{ $track->id }}, title {{ $track->title }}, album {{ $track->album->title }}

            <form action="/tracks/{{ $track->id }}/edit" method = 'get'>
                <input type = 'submit' value = 'modify'>
            </form>

            <form action="/tracks/{{ $track->id }}" method = 'get'>
                <input type = 'submit' value = 'show'>
            </form>
        </li>
    @endforeach
</ul>

<br>
Create a new item <a href="/tracks/create">here</a>
@endsection