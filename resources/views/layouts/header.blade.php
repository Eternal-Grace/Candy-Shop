<header class="p-3 mb-3 border-bottom">
    <div class="container">
        <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">

            <div class="d-flex align-items-center mb-2 mb-lg-0 text-dark text-decoration-none">
                <span class="navbar-brand" >{{ config('app.name', 'Candy Shop') }}</span>
            </div>

            <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                <li>
                    <a href="{{ url('/') }}" class="nav-link px-2 link-secondary">
                        @lang('pages.showcase')
                    </a>
                </li>
                <li>
                    <a href="{{ url('donation') }}" class="nav-link px-2 link-secondary">
                        @lang('pages.donation')
                    </a>
                </li>
            </ul>

            {{-- Auth User --}}
            @auth()
            <div class="dropdown text-end">
                <a href="#" class="d-block link-dark text-decoration-none dropdown-toggle" id="dropdownUser"
                   data-bs-toggle="dropdown" aria-expanded="false">
                    <img src="https://github.com/mdo.png" alt="mdo" class="rounded-circle" width="48" height="48" />
                    <span>
                        {{ Auth::user()->username }}
                    </span>
                </a>

                <ul class="dropdown-menu text-small" aria-labelledby="dropdownUser" style="">
                    <li><a class="dropdown-item" href="#">New project...</a></li>
                    <li><a class="dropdown-item" href="#">Settings</a></li>
                    <li><a class="dropdown-item" href="#">Profile</a></li>

                    <li><hr class="dropdown-divider"></li>

                    <li>
                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                            @lang('pages.logout')
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </li>
                </ul>
            </div>
            @endauth

            {{-- Guest User --}}
            @guest()
            <ul class="nav nav-pills">
                @if (Route::has('login'))
                <li class="nav-item">
                    <a href="{{ route('login') }}" class="nav-link {{ Route::is('login') ? 'active' : '' }}" aria-current="page">
                        @lang('pages.login')
                    </a>
                </li>
                @endif

                @if (Route::has('register'))
                <li class="nav-item">
                    <a href="{{ route('register') }}" class="nav-link {{ Route::is('register') ? 'active' : '' }}">
                        @lang('pages.register')
                    </a>
                </li>
                @endif
            </ul>
            @endguest
        </div>
    </div>
</header>
