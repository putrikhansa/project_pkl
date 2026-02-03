<header id="header" class="header sticky-top">
    <div class="branding d-flex align-items-center">
        <div class="container position-relative d-flex align-items-center justify-content-between">

            <a href="/" class="logo d-flex align-items-center me-auto">
                <h1 class="sitename">School<span>Care</span></h1>
            </a>

            <nav id="navmenu" class="navmenu">
                <ul>
                    <li><a href="#hero" class="active">Beranda</a></li>
                    <li><a href="#about">Tentang</a></li>
                    <li><a href="#jadwal">Jadwal</a></li>
                    <li><a href="#kegiatan">Kegiatan</a></li>
                    <li><a href="#edukasi">Edukasi</a></li>
                    {{-- <li><a href="#contact">Kontak</a></li> --}}

                    @guest
                        <li><a class="cta-btn ms-xl-4" href="{{ route('login') }}">Login</a></li>
                    @else
                        <li class="dropdown"><a href="#"><span>Akun</span> <i
                                    class="bi bi-chevron-down toggle-dropdown"></i></a>
                            <ul>
                                <li><a href="{{ route('dashboard') }}">Dashboard</a></li>
                                <li>
                                    <a href="#"
                                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        Logout
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </li>
                            </ul>
                        </li>
                    @endguest
                </ul>
                <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
            </nav>

        </div>
    </div>
</header>
<style>
    /* Menghaluskan Tulisan Logo */
    .sitename {
        font-size: 28px;
        font-weight: 700;
        color: #2c4964;
    }

    .sitename span {
        color: #1977cc;
        /* Warna Biru Medilab */
    }

    /* Tombol Login (CTA) */
    .navmenu .cta-btn {
        background: #1977cc;
        color: white !important;
        padding: 8px 25px !important;
        border-radius: 50px;
        margin-left: 20px;
        transition: 0.3s;
        font-weight: 500;
    }

    .navmenu .cta-btn:hover {
        background: #1c84e3;
        transform: translateY(-2px);
    }

    /* Perbaikan Logout di Mobile */
    #logout-form button {
        font-family: var(--nav-font);
        font-size: 15px;
        font-weight: 400;
    }

    /* Garis Navigasi saat Hover */
    .navmenu a::after {
        content: '';
        display: block;
        width: 0;
        height: 2px;
        background: #1977cc;
        transition: width .3s;
    }

    .navmenu a:hover::after {
        width: 100%;
    }

    /* Khusus CTA Button tidak pakai garis */
    .navmenu .cta-btn::after {
        display: none;
    }
    </style>
