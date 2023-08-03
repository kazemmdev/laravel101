<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">    
    <title>@yield('title', 'Laravel101')</title>
    @vite('resources/css/app.css')
</head>
<body>
    @include('nav')
    <div class='w-full max-w-2xl mx-auto md:px-5 px-4 pt-8'>
        @yield('content')
    </div>
</body>
</html>