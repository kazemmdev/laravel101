<nav class="relative flex justify-between items-center bg-white">
    <ul class="h-full w-full max-w-2xl mx-auto md:px-5 px-4 py-4 space-x-4 flex items-center justify-between">
        <li>
            <a class="text-gray-900 font-bold" href="{{ route('tasks.index') }}">{{ __('title') }}</a>
        </li>
        <li class="flex">
            @auth
                <form method="POST" action={{ route('logout') }}>
                    @csrf
                    <button class="btn-primary text-sm !py-2" type="submit">{{ __('logout') }}</button>
                </form>
            @endauth
            @guest
                <a class="btn-secondary text-sm !py-2 mr-2" href={{ route('login') }}>{{ __('login') }}</a>
                <a class="btn-primary text-sm !py-2" href={{ route('register') }}>{{ __('register') }}</a>
            @endguest
            <div class="relative inline-block">
                <button id="dropper" type="button" class="btn-secondary text-sm !py-2 ml-2">
                    {{ app()->getLocale() }}
                </button>
                <div id="dropdown" class="absolute right-0 z-10 mt-2 w-12 origin-top-right rounded-xl bg-white shadow-lg border hidden">
                    <form method="POST" action="{{ route('locale.store') }}?locale=en">
                        @csrf
                        <button type="submit" class="text-gray-700 w-full px-4 py-2 text-sm">En</button>
                    </form>
                    <form method="POST" action="{{ route('locale.store') }}?locale=fr">
                        @csrf
                        <button type="submit" class="text-gray-700 w-full px-4 py-2 text-sm">Fr</button>
                    </form>
                </div>
            </div>
        </li>
    </ul>
</nav>
