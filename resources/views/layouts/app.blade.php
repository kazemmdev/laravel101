<!DOCTYPE html>
<html lang="en">
<head>
    <title>@yield('title', 'Laravel101')</title>
</head>
<body>
    <div id='app'>
        @include('nav')
        @yield('content')
    </div>
</body>
</html>