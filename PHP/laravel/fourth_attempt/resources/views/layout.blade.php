
{{-- layout.blade.php --}}

<html>
    <head>
        <title>@yield('title')</title>
    </head>
    <body>
        <ul>
            <li><a href="/">Homepage</a></li>
            <li><a href="/albums">Albums list</a></li>
            <li><a href="/tracks">Tracks list</a></li>
        </ul>
        @yield('page_contents')
    </body>
</html>