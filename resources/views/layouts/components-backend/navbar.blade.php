 <nav class="navbar header-navbar pcoded-header">
     <div class="navbar-wrapper">
         <div class="navbar-logo">
             <a class="mobile-menu waves-effect waves-light" id="mobile-collapse" href="#!">
                 <i class="ti-menu"></i>
             </a>
             <div class="mobile-search waves-effect waves-light">
                 <div class="header-search">
                     <div class="main-search morphsearch-search">
                         <div class="input-group">
                             <span class="input-group-prepend search-close"><i
                                     class="ti-close input-group-text"></i></span>
                             <input type="text" class="form-control" placeholder="Enter Keyword">
                             <span class="input-group-append search-btn"><i
                                     class="ti-search input-group-text"></i></span>
                         </div>
                     </div>
                 </div>
             </div>
             <a href="index.html">
                 <img class="img-fluid" src="{{ asset('assets/backend/images/logo.png') }}" alt="Theme-Logo" />
             </a>
             <a class="mobile-options waves-effect waves-light">
                 <i class="ti-more"></i>
             </a>
         </div>
         <div class="navbar-container container-fluid">
             <ul class="nav-left">
                 <li>
                     <div class="sidebar_toggle"><a href="javascript:void(0)"><i class="ti-menu"></i></a></div>
                 </li>
                 <li>
                     <a href="#!" onclick="javascript:toggleFullScreen()" class="waves-effect waves-light">
                         <i class="ti-fullscreen"></i>
                     </a>
                 </li>
             </ul>
             <ul class="nav-right">
                 @if (Auth::check())
                     <li class="user-profile header-notification">
                         <a href="#!" class="waves-effect waves-light">
                             <img src="{{ asset('assets/backend/images/avatar-4.jpg') }}" class="img-radius"
                                 alt="User-Profile-Image">
                             <span>{{ Auth::user()->name }}</span>
                             <i class="ti-angle-down"></i>
                         </a>
                         <ul class="show-notification profile-notification">
                             <li class="waves-effect waves-light">
                                 <span> {{ Auth::user()->role }} </span>
                             </li>
                     </li>
                     <li class="waves-effect waves-light">
                         <a href="{{ route('logout') }}"
                             onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                             class="border-0 bg-transparent text-primary ms-auto" tabindex="0" type="a"
                             aria-label="logout" data-bs-toggle="tooltip" data-bs-placement="top"
                             data-bs-title="logout">
                             <i class="ti-layout-sidebar-left"></i> Logout

                             <form action="{{ route('logout') }}" method="post" id="logout-form">
                                 @csrf
                             </form>
                     </li>
             </ul>
             </li>
             @endif
             </ul>
         </div>
     </div>
 </nav>
