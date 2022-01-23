    <header>
        <h1>PMON2</h1>
        <ul>
            <li><a href="{{route('home')}}" class='{{request()->routeIs('home') ? 'active' : ''}}'>Home</a></li>
            <li><a href="{{route('targets.index')}}"  class='{{request()->routeIs('targets.*') ? 'active' : ''}}'>Targets</a></li>
            <li><a href="{{route('settings.index')}}"  class='{{request()->routeIs('settings.index') ? 'active' : ''}}'>Settings</a></li>
        </ul>
    </header>
