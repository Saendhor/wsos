{{-- layout.blade.php --}}

<!DOCTYPE html>
<html>
    <head>
        <title>@yield('title')</title>
    </head>
    <body>
        <h2>Find more!</h2>
        <ul>
            <li>Contact us <a href="/contact">here</a></li>
            <li><a href="/about">About us</a> </li>
            <li><a href="/">Homepage</a></li>
        </ul>
        @yield('page_content')
    </body>
</html>