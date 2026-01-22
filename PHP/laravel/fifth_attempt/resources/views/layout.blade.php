
{{-- layout.blade.php --}}

<html>
    <head>
        <title>@yield('title')</title>
    </head>
    <body>
        <ul>
            <li><a href="/">Homepage</a></li>
            <li><a href="/albums">Album index</a></li>
            <li><a href="/tracks">Tracks index</a></li>
        </ul>
        @yield('page_contents')
    </body>
</html>