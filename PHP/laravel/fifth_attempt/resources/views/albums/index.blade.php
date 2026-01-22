
{{-- albums/index.blade.php --}}

@extends('layout')

@section('title', 'Album index')

@section('page_contents')
<h1>Album index</h1>
Here is the list of available albums:
<ul>
    @foreach ($albums as $album)
        <li>
            Item id {{ $album->id }}, title {{ $album->title }}, artist {{ $album->artist }}

            <form action="/albums/{{ $album->id }}/edit" method = 'get'>
                <input type = 'submit' value = 'modify'>
            </form>

            <form action="/albums/{{ $album->id }}" method = 'get'>
                <input type = 'submit' value = 'show'>
            </form>
        </li>
    @endforeach
</ul>

<br>
Create a new item <a href="/albums/create">here</a>
@endsection