<nav class="pcoded-navbar">
    <div class="sidebar_toggle"><a href="#"><i class="icon-close icons"></i></a></div>
    <div class="pcoded-inner-navbar main-menu">

        <div class="pcoded-navigation-label">Main Navigation</div>
        <ul class="pcoded-item pcoded-left-item">
            <li class="{{ request()->routeIs('home') ? 'active' : '' }}">
                <a href="{{ route('home') }}" class="waves-effect waves-dark">
                    <span class="pcoded-micon"><i class="ti-home"></i><b>D</b></span>
                    <span class="pcoded-mtext">Dashboard</span>
                    <span class="pcoded-mcaret"></span>
                </a>
            </li>
        </ul>

        <div class="pcoded-navigation-label">Manajemen Data</div>
        <ul class="pcoded-item pcoded-left-item">
            @if (auth()->user()->role === 'admin')
                <li class="{{ request()->routeIs('backend.user.*') ? 'active' : '' }}">
                    <a href="{{ route('backend.user.index') }}" class="waves-effect waves-dark">
                        <span class="pcoded-micon"><i class="ti-id-badge"></i><b>U</b></span>
                        <span class="pcoded-mtext">Data User</span>
                        <span class="pcoded-mcaret"></span>
                    </a>
                </li>
            @endif

            <li class="{{ request()->routeIs('backend.siswa.*') ? 'active' : '' }}">
                <a href="{{ route('backend.siswa.index') }}" class="waves-effect waves-dark">
                    <span class="pcoded-micon"><i class="ti-user"></i><b>S</b></span>
                    <span class="pcoded-mtext">Data Siswa</span>
                    <span class="pcoded-mcaret"></span>
                </a>
            </li>

            <li class="{{ request()->routeIs('backend.kelas.*') ? 'active' : '' }}">
                <a href="{{ route('backend.kelas.index') }}" class="waves-effect waves-dark">
                    <span class="pcoded-micon"><i class="ti-layout-grid2"></i><b>K</b></span>
                    <span class="pcoded-mtext">Data Kelas</span>
                    <span class="pcoded-mcaret"></span>
                </a>
            </li>

            <li class="{{ request()->routeIs('backend.obat.*') ? 'active' : '' }}">
                <a href="{{ route('backend.obat.index') }}" class="waves-effect waves-dark">
                    <span class="pcoded-micon"><i class="ti-package"></i><b>O</b></span>
                    <span class="pcoded-mtext">Stok Obat</span>
                    <span class="pcoded-mcaret"></span>
                </a>
            </li>
        </ul>

        <div class="pcoded-navigation-label">Layanan Kesehatan</div>
        <ul class="pcoded-item pcoded-left-item">
            <li class="{{ request()->routeIs('backend.rekam_medis.*') ? 'active' : '' }}">
                <a href="{{ route('backend.rekam_medis.index') }}" class="waves-effect waves-dark">
                    <span class="pcoded-micon"><i class="ti-clipboard"></i><b>RM</b></span>
                    <span class="pcoded-mtext">Rekam Medis</span>
                    <span class="pcoded-mcaret"></span>
                </a>
            </li>

            <li class="{{ request()->routeIs('backend.jadwal_pemeriksaan.*') ? 'active' : '' }}">
                <a href="{{ route('backend.jadwal_pemeriksaan.index') }}" class="waves-effect waves-dark">
                    <span class="pcoded-micon"><i class="ti-calendar"></i><b>J</b></span>
                    <span class="pcoded-mtext">Jadwal Pemeriksaan</span>
                    <span class="pcoded-mcaret"></span>
                </a>
            </li>

            <li
                class="pcoded-hasmenu {{ request()->routeIs('backend.edukasi.*') || request()->routeIs('backend.kategori_edukasi.*') ? 'active pcoded-trigger' : '' }}">
                <a href="javascript:void(0)" class="waves-effect waves-dark">
                    <span class="pcoded-micon"><i class="ti-book"></i><b>E</b></span>
                    <span class="pcoded-mtext">Edukasi UKS</span>
                    <span class="pcoded-mcaret"></span>
                </a>
                <ul class="pcoded-submenu">
                    <li class="{{ request()->routeIs('backend.edukasi.index') ? 'active' : '' }}">
                        <a href="{{ route('backend.edukasi.index') }}" class="waves-effect waves-dark">
                            <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                            <span class="pcoded-mtext">Materi Edukasi</span>
                            <span class="pcoded-mcaret"></span>
                        </a>
                    </li>
                    <li class="{{ request()->routeIs('backend.kategori_edukasi.index') ? 'active' : '' }}">
                        <a href="{{ route('backend.kategori_edukasi.index') }}" class="waves-effect waves-dark">
                            <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                            <span class="pcoded-mtext">Kategori Materi</span>
                            <span class="pcoded-mcaret"></span>
                        </a>
                    </li>
                </ul>
            </li>
        </ul>

        <div class="pcoded-navigation-label">Laporan & Audit</div>
        <ul class="pcoded-item pcoded-left-item">
            <li class="{{ request()->routeIs('backend.rekam_medis.laporan') ? 'active' : '' }}">
                <a href="{{ route('backend.rekam_medis.laporan') }}" class="waves-effect waves-dark">
                    <span class="pcoded-micon"><i class="ti-stats-up"></i><b>L</b></span>
                    <span class="pcoded-mtext">Laporan Kunjungan</span>
                    <span class="pcoded-mcaret"></span>
                </a>
            </li>
            <li class="{{ request()->routeIs('backend.jadwal_pemeriksaan.laporan') ? 'active' : '' }}">
                <a href="{{ route('backend.jadwal_pemeriksaan.laporan') }}" class="waves-effect waves-dark">
                    <span class="pcoded-micon"><i class="ti-printer"></i><b>L</b></span>
                    <span class="pcoded-mtext">Laporan Jadwal</span>
                    <span class="pcoded-mcaret"></span>
                </a>
            </li>
            @if (auth()->user()->role === 'admin')
                <li class="{{ request()->routeIs('backend.log.index') ? 'active' : '' }}">
                    <a href="{{ route('backend.log.index') }}" class="waves-effect waves-dark">
                        <span class="pcoded-micon"><i class="ti-shield"></i><b>LA</b></span>
                        <span class="pcoded-mtext">Log Aktivitas</span>
                        <span class="pcoded-mcaret"></span>
                    </a>
                </li>
            @endif
        </ul>
    </div>
</nav>
