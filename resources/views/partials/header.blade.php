<header>
    <div class="container">

        <nav>
            @if (Route::has('login'))
                @auth
                    <a href="{{ url('/') }}">Home</a>
                @else
                    <a href="{{ route('login') }}">Login</a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}">Register</a>
                    @endif
                @endauth
            @endif
            
        </nav>
    </div>
</header>