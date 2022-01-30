    <header>
        @livewire('navigation-menu')
        {{-- <h1>PMON2</h1>
        <ul>
            <li><a href="{{route('home')}}" class='{{request()->routeIs('home') ? 'active' : ''}}'>Home</a></li>
            <li><a href="{{route('targets.index')}}"  class='{{request()->routeIs('targets.*') ? 'active' : ''}}'>Targets</a></li>
            <li><a href="{{route('settings.index')}}"  class='{{request()->routeIs('settings.index') ? 'active' : ''}}'>Settings</a></li>
        </ul>
         @if (Route::has('login'))
                <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                    @auth
                        <a href="{{ url('/home') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Home</a>
                    @else
                        <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
                        @endif
                    @endauth
                </div>
            @endif --}}
    </header>
