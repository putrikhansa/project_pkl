 <nav class="pcoded-navbar">
     <div class="sidebar_toggle"><a href="#"><i class="icon-close icons"></i></a></div>
     <div class="pcoded-inner-navbar main-menu">
         <div class="">
             <div class="main-menu-header">
                 <img class="img-80 img-radius" src="{{ asset('assets/backend/images/avatar-4.jpg') }}"
                     alt="User-Profile-Image">
                 <div class="user-details">
                     <span id="more-details">John Doe<i class="fa fa-caret-down"></i></span>
                 </div>
             </div>
             <div class="main-menu-content">
                 <ul>
                     <li class="more-details">
                         <a href="user-profile.html"><i class="ti-user"></i>View Profile</a>
                         <a href="#!"><i class="ti-settings"></i>Settings</a>

                 </ul>
             </div>
         </div>
         <div class="p-15 p-b-0">
             <form class="form-material">
                 <div class="form-group form-primary">
                     <input type="text" name="footer-email" class="form-control">
                     <span class="form-bar"></span>
                     <label class="float-label"><i class="fa fa-search m-r-10"></i>Search
                         Friend</label>
                 </div>
             </form>
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
         <div class="pcoded-navigation-label">Forms</div>
         <ul class="pcoded-item pcoded-left-item">
             <li class="">
                 <a href="{{ route('petugas.index') }}" class="waves-effect waves-dark">
                     <span class="pcoded-micon"><i class="ti-layers"></i><b>FC</b></span>
                     <span class="pcoded-mtext">Petugas </span>
                     <span class="pcoded-mcaret"></span>
                 </a>
             </li>
             <li class="">
                 <a href="{{ route('siswa.index') }}" class="waves-effect waves-dark">
                     <span class="pcoded-micon"><i class="ti-layers"></i><b>FC</b></span>
                     <span class="pcoded-mtext">Siswa </span>
                     <span class="pcoded-mcaret"></span>
                 </a>
             </li>
             <li class="">
                 <a href="{{ route('obat.index') }}" class="waves-effect waves-dark">
                     <span class="pcoded-micon"><i class="ti-layers"></i><b>FC</b></span>
                     <span class="pcoded-mtext">Obat </span>
                     <span class="pcoded-mcaret"></span>
                 </a>
             </li>
             <li class="">
                 <a href="{{ route('rekam_medis.index') }}" class="waves-effect waves-dark">
                     <span class="pcoded-micon"><i class="ti-layers"></i><b>FC</b></span>
                     <span class="pcoded-mtext">Rekam Medis </span>
                     <span class="pcoded-mcaret"></span>
                 </a>
             </li>
             <li class="">
                 <a href="{{ route('kelas.index') }}" class="waves-effect waves-dark">
                     <span class="pcoded-micon"><i class="ti-layers"></i><b>FC</b></span>
                     <span class="pcoded-mtext">Kelas </span>
                     <span class="pcoded-mcaret"></span>
                 </a>
             </li>
             <li class="">
                 <a href="{{ route('jadwal_pemeriksaan.index') }}" class="waves-effect waves-dark">
                     <span class="pcoded-micon"><i class="ti-layers"></i><b>FC</b></span>
                     <span class="pcoded-mtext">Jadwal Pemeriksaan </span>
                     <span class="pcoded-mcaret"></span>
                 </a>
             </li>
             <li class="">
                 <a href="{{ route('rekam_medis.laporan') }}" class="waves-effect waves-dark">
                     <span class="pcoded-micon"><i class="ti-bar-chart"></i><b>FC</b></span>
                     <span class="pcoded-mtext">Laporan Kunjungan </span>
                     <span class="pcoded-mcaret"></span>
                 </a>
             </li>
             <li class="">
                 <a href="{{ route('jadwal_pemeriksaan.laporan') }}" class="waves-effect waves-dark">
                     <span class="pcoded-micon"><i class="ti-bar-chart"></i><b>FC</b></span>
                     <span class="pcoded-mtext">Laporan Jadwal </span>
                     <span class="pcoded-mcaret"></span>
                 </a>
             </li>


         </ul>
     </div>
 </nav>
