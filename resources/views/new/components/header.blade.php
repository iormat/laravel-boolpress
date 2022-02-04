<header>
    <h1> Laravel Boolpress </h1>
    <div class="user">
        @auth
            <span>
                {{Auth::user() -> name}}
            </span>
            <button id="logout" class="btn btn-danger">
                <a href="{{ route('logout') }}">Logout</a>
            </button>
        @endauth
    </div>
</header>
