<nav class="navbar navbar-expand-lg navbar-light navbar-store fixed-top navbar-fixed-top" data-aos="fade-down">
    <div class="container">
        <a href="#" class="navbar-brand">
            <h3>SPK MINIMARKET</h3>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item {{ request()->is('home') ? 'active' : '' }}">
                    <a href="{{ route('home') }}" class="nav-link">Beranda</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Data
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('minimarket.index') }}">Minimarket</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="{{ route('kriteria.index') }}">Kriteria</a>
                        <a class="dropdown-item" href="{{ route('sub_kriteria.index') }}">Sub Kriteria</a>
                    </div>
                </li>
                <li class="nav-item {{ request()->is('penilaian') ? 'active' : '' }}">
                    <a href="{{ route('penilaian.index') }}" class="nav-link">Penilaian</a>
                </li>
                <li class="nav-item {{ request()->is('hasil') ? 'active' : '' }}">
                    <a href="{{ route('hasil.index') }}" class="nav-link">Hasil</a>
                </li>
            </ul>

            @auth
                <ul class="navbar-nav d-none d-lg-flex">
                    <li class="nav-item dropdown">
                        <a href="#" class="nav-link" id="navbarDropdown" role="button" data-toggle="dropdown">
                            Hi, {{ Auth::user()->name }}
                        </a>
                        <div class="dropdown-menu">
                            <a href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                          document.getElementById('logout-form').submit();"
                                class="dropdown-item">Logout</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                </ul>

                <!-- Mobile Menu -->
                <ul class="navbar-nav d-block d-lg-none">
                    <li class="nav-item">
                        <a href="" class="nav-link"> Hi, {{ Auth::user()->name }} </a>
                    </li>
                </ul>
            @endauth
        </div>
    </div>
</nav>
