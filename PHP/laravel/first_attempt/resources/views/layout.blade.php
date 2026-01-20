{{-- layout.blade.php --}}

<html>
    <head>
    <title>@yield('title')</title>
    </head>
    <body>
        <ul>
            <li> <a href="/">Homepage</a> </li>
            <li> <a href="/about">More about us</a> </li>
            <br>
            <li> <a href="/projects">Projects</a> </li>
            <li> <a href="/tasks">Tasks</a> </li>
        </ul>
    </body>
    @yield('page_content')
</html>