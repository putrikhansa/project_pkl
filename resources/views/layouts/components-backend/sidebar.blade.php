 <nav class="pcoded-navbar">
     <div class="sidebar_toggle"><a href="#"><i class="icon-close icons"></i></a></div>
     <div class="pcoded-inner-navbar main-menu">
         <div class="">
             <div class="main-menu-header">
                 <img class="img-80 img-radius" src="{{ asset('assets/backend/images/avatar-4.jpg') }}"
                     alt="User-Profile-Image">
                 <div class="user-details">
                     <span>{{ Auth::user()->name }}</span>
                 </div>
             </div>
         </div>

         <div class="pcoded-navigation-label">Navigation</div>
         <ul class="pcoded-item pcoded-left-item">
             <li class="active">
                 <a href="{{ route('home') }}
                 "class="waves-effect waves-dark">
                     <span class="pcoded-micon"><i class="ti-home"></i><b>D</b></span>
                     <span class="pcoded-mtext">Dashboard</span>
                     <span class="pcoded-mcaret"></span>
                 </a>
             </li>
         </ul>
         <div class="pcoded-navigation-label">Tables</div>
         <ul class="pcoded-item pcoded-left-item">


             @if (auth()->user()->role === 'admin')
                 <li class="">
                     <a href="{{ route('backend.user.index') }}" class="waves-effect waves-dark">
                         <span class="pcoded-micon"><i class="tf-icons bx bx-id-card"></i><b>FC</b></span>
                         <span class="pcoded-mtext">User </span>
                         <span class="pcoded-mcaret"></span>
                     </a>
                 </li>
             @endif

             <li class="">
                 <a href="{{ route('backend.siswa.index') }}" class="waves-effect waves-dark">
                     <span class="pcoded-micon"><i class="ti-user"></i><b>FC</b></span>
                     <span class="pcoded-mtext">Siswa </span>
                     <span class="pcoded-mcaret"></span>
                 </a>
             </li>
             <li class="">
                 <a href="{{ route('backend.obat.index') }}" class="waves-effect waves-dark">
                     <span class="pcoded-micon"><i class="tf-icons bx bx-capsule"></i><b>FC</b></span>
                     <span class="pcoded-mtext">Obat </span>
                     <span class="pcoded-mcaret"></span>
                 </a>
             </li>
             <li class="">
                 <a href="{{ route('backend.rekam_medis.index') }}" class="waves-effect waves-dark">
                     <span class="pcoded-micon"><i class="bx bx-folder"></i><b>FC</b></span>
                     <span class="pcoded-mtext">Rekam Medis </span>
                     <span class="pcoded-mcaret"></span>
                 </a>
             </li>
             <li class="">
                 <a href="{{ route('backend.kelas.index') }}" class="waves-effect waves-dark">
                     <span class="pcoded-micon"><i class="bx bx-book-open"></i><b>FC</b></span>
                     <span class="pcoded-mtext">Kelas </span>
                     <span class="pcoded-mcaret"></span>
                 </a>
             </li>
             <li class="">
                 <a href="{{ route('backend.jadwal_pemeriksaan.index') }}" class="waves-effect waves-dark">
                     <span class="pcoded-micon"><i class="bx bx-calendar"></i><b>FC</b></span>
                     <span class="pcoded-mtext">Jadwal Pemeriksaan </span>
                     <span class="pcoded-mcaret"></span>
                 </a>
             </li>
             <div class="pcoded-navigation-label">Laporan</div>
             <ul class="pcoded-item pcoded-left-item">
                 <li class="">
                     <a href="{{ route('backend.rekam_medis.laporan') }}" class="waves-effect waves-dark">
                         <span class="pcoded-micon"><i class="bx bx-bar-chart-alt-2"></i><b>FC</b></span>
                         <span class="pcoded-mtext">Laporan Kunjungan </span>
                         <span class="pcoded-mcaret"></span>
                     </a>
                 </li>
                 <li class="">
                     <a href="{{ route('backend.jadwal_pemeriksaan.laporan') }}" class="waves-effect waves-dark">
                         <span class="pcoded-micon"><i class="bx bx-calendar-check"></i><b>FC</b></span>
                         <span class="pcoded-mtext">Laporan Jadwal </span>
                         <span class="pcoded-mcaret"></span>
                     </a>
                 </li>
             </ul>
             <div class="pcoded-navigation-label">Log Aktivitas</div>
             <ul class="pcoded-item pcoded-left-item">
                 @if (auth()->user()->role === 'admin')
                     <li class="">
                         <a href="{{ route('backend.log.index') }}" class="waves-effect waves-dark">
                             <span class="pcoded-micon"><i class="bx bx-history"></i><b>FC</b></span>
                             <span class="pcoded-mtext">Log Aktivitas </span>
                             <span class="pcoded-mcaret"></span>
                         </a>
                     </li>
                 @endif
             </ul>
         </ul>
     </div>
 </nav>
