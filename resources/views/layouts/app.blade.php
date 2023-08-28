<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">    
    <title>@yield('title', 'Laravel101')</title>
    @vite('resources/css/app.css')
</head>
<body>
    @include('common.nav')
    <div class='w-full max-w-2xl mx-auto md:px-5 px-4 pt-8'>
        @yield('content')
    </div>
    @vite('resources/js/app.js')
    @stack('scripts')
</body>
</html>