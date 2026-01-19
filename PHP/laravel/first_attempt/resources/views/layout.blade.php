{{-- layout.blade.php --}}

<html>
    <head>
    <title>@yield('title')</title>
    </head>
    <body>
        <ul>
            <li> <a href="/">Homepage</a> </li>
            <li> <a href="/about">More about us</a> </li>
        </ul>
    </body>
    @yield('page_content')
</html>