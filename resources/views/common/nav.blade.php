<nav class="relative flex justify-between items-center bg-white">
    <ul class="h-full w-full max-w-2xl mx-auto md:px-5 px-4 py-4 space-x-4 flex items-center justify-between">
        <li>
            <a class="text-gray-900 font-bold" href="/">Laravel101: Tasks App</a>
        </li>
        <li>
            @auth
                <form method="POST" action={{ route('logout') }}>
                    @csrf
                    <button class="btn-primary text-sm !py-2" type="submit">Logout</button>
                </form>
            @endauth
            @guest
                <a class="btn-secondary text-sm !py-2 mr-2" href={{ route('login') }}>Sign In</a>
                <a class="btn-primary text-sm !py-2" href={{ route('register') }}>Sign up</a>
            @endguest
        </li>
    </ul>
</nav>
