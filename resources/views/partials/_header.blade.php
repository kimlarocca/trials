<header>
    <div class="grid-x grid-margin-x grid-margin-y align-middle">
        <div class="cell small-6">
            <v-nav></v-nav>
        </div>
        <div class="cell small-6 text-right">
            @guest
            <a class="button secondary" href="/login">client login</a>
            @else
                <strong class="margin-right-1">Hello, {{ Auth::user()->name }}!</strong>
                <a class="dropdown-item button secondary" href="/dashboard">dashboard</a>
            @endguest
        </div>
    </div>
</header>
