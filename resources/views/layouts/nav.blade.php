<nav id="navigation" class="navbar" role="navigation" aria-label="main navigation">
    <div class="container">
        <div class="navbar-brand">
            <a class="logo navbar-item" href="{{ url('/') }}">
                <img src="{{ asset('/img/icons/mars.svg') }}">
                <h1 class="title is-5">TMS</h1>
            </a>

            <a role="button" id="navbar-main-burger" class="navbar-burger burger" aria-label="menu" aria-expanded="false" data-target="navbar-main">
                <span aria-hidden="true"></span>
                <span aria-hidden="true"></span>
                <span aria-hidden="true"></span>
            </a>
        </div>

        <div id="navbar-main" class="navbar-menu">

            @auth
                <div class="navbar-start">
                    <div class="navbar-item has-dropdown is-hoverable">
                        <a class="navbar-link">Spiel</a>

                        <div class="navbar-dropdown">
                            <a class="navbar-item" href="{{ route('games.index') }}">Liste</a>
                            <a class="navbar-item" href="{{ route('games.create') }}">Neu</a>
                        </div>
                    </div>
                </div>
            @endauth

            <div class="navbar-end">
                @guest
                    <div class="navbar-item">
                        <div class="buttons">
                            <a class="button is-primary" href="{{ route('login') }}">
                                <strong>Anmelden</strong>
                            </a>
                        </div>
                    </div>
                @else
                    <div class="navbar-item has-dropdown is-hoverable">
                        <a class="navbar-link">{{ Auth::user()->name }} </a>

                        <div class="navbar-dropdown">
                            <a class="navbar-item"
                               href="{{ route('logout') }}"
                               onclick="event.preventDefault();document.getElementById('logout-form').submit();"
                            >
                                Abmelden
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST">
                                @csrf
                            </form>
                        </div>
                    </div>
                @endguest
            </div>
        </div>
    </div>
</nav>
