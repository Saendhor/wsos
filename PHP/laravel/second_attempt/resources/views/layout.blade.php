{{-- layout.blade.php --}}

<html>
    <head><title>@yield('title')</title><head>
    <body>
        <ul>
            <li><a href="/">Homepage</a></li>
            <li><a href="/projects">Projects</a></li>
            <li><a href="/tasks">Tasks</a></li>
        </ul>
        @yield('page_contents')
    </body>
</html>