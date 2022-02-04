<header>
    <h1> Page Header </h1>
    <div class="user">
        @auth
            <span>
                {{Auth::user() -> name}}
            </span>
            <button class="btn btn-danger">
                <a href="{{ route('logout') }}">Logout</a>
            </button>
        @endauth
    </div>
</header>
