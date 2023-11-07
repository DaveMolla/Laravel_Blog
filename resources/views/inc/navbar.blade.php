<nav class="navbar fixed-top navbar-expand-md p-3 bg-dark">
    <div class="container">
        <a class="navbar-brand text-light" href="{{ url('/') }}">
            {{ config('app.name', 'Laravel') }}
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav">
                {{-- <li><a href="/" class="nav-link px-2 text-white">Home</a></li> --}}
                {{-- <li><a href="/about" class="nav-link px-2 text-white">About</a></li> --}}
                <li><a href="/services" class="nav-link px-2 text-white">Services</a></li>
                <li><a href="/posts" class="nav-link px-2 text-white">Blog</a></li>
            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ms-auto">
                <!-- Authentication Links -->
                @guest
                    @if (Route::has('login'))
                        <li class="nav-item">
                            <a class="nav-link text-white" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                    @endif

                    {{-- @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link text-white" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif --}}
                @else
                    @if (auth()->user() && auth()->user()->is_admin)
                        <p>
                            <a href="/register" class="btn btn-success btn-lg" role="button">Register a User</a>
                        </p>
                    @endif
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle text-white" href="#" role="button"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }}
                        </a>
                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            @if (auth()->user() && auth()->user()->is_admin)
                                <a href="admin" class="dropdown-item">Admin Dashboard</a>
                            @endif
                            <a class="dropdown-item" href="/home">Dashboard</a>
                            <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                           document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>
<div style="margin-bottom: 95px">

</div>
