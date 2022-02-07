<header>
    <h1> <a href="{{route('index')}}"> Boolpress </a></h1>
    @if ($errors -> any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
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
