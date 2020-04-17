<header>
    <div class="grid-x grid-margin-x grid-margin-y align-middle">
        <div class="cell small-6">
            <nav>
                <input id="toggle" type="checkbox"></input>
                <label for="toggle" class="hamburger" id="trigger">
                    <div class="top-bun"></div>
                    <div class="meat"></div>
                    <div class="bottom-bun"></div>
                </label>
                <div class="menu">menu</div>
            </nav>
        </div>
        <div class="cell small-6 text-right">
            @guest
            <a class="button secondary" href="/login">client login</a>
            @else
                <strong>Hello, {{ Auth::user()->name }}!</strong>
                <a class="dropdown-item button secondary" href="{{ route('logout') }}"
                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                      style="display: none;">@csrf</form>
            @endguest
        </div>
    </div>
</header>
