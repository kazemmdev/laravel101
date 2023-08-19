<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">    
    <title>@yield('title', 'Laravel101')</title>
    @vite('resources/css/app.css')
</head>
<body>
    <div class='w-full max-w-md mx-auto md:px-5 px-4 pt-8'>
        @yield('content')
    </div>
</body>
</html>