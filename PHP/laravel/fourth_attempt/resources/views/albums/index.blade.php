
{{-- albums/index.blade.php --}}

@extends('layout')

@section('title', 'Available albums')

@section('page_contents')
<h1>Available albums</h1>
<ul>
    @foreach ($albums as $album)
        <li>Item number: {{ $album->id }} , 
            {{ $album->name }} , 
            {{ $album->artist }} , 
            {{ $album->genre }} , 
            {{ $album->year }}

            <form action = '/albums/{{ $album->id }}/edit' method = 'get'>
                <input type = 'submit' value = 'edit'>
            </form>

            <form action = '/albums/{{ $album->id }}' method = 'get'>
                <input type = 'submit' value = 'show'>
            </form>
        </li>
    @endforeach
</ul>

<br>Add a new album to the availables <a href="/albums/create">here</a>
@endsection