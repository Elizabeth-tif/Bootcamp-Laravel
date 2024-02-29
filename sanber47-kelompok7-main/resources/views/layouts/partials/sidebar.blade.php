<div class="sidenav-header">
    <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none"
        aria-hidden="true" id="iconSidenav"></i>
    <a class="navbar-brand m-0" href="/">
        <img src="{{ asset('template_bersih/assets/img/TLApink.png') }}" class="navbar-brand-img h-100" alt="main_logo" />
    </a>
</div>
<hr class="horizontal light mt-0 mb-2" />
<div class="collapse navbar-collapse w-auto max-height-vh-100" id="sidenav-collapse-main">
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link text-white @if($title === 'dashboard') active bg-gradient-primary @endif" href="/">
                <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                    <i class="material-icons opacity-10">home</i>
                </div>
                <span class="nav-link-text ms-1">Dashboard</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link text-white @if($title === 'version') active bg-gradient-primary @endif" href="/versi">
                <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                    <i class="material-icons opacity-10">import_export</i>
                </div>
                <span class="nav-link-text ms-1"> Versi Laravel </span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link text-white @if($title === 'tanyajawab') active bg-gradient-primary @endif" href="/tanyajawab">
                <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                    <i class="material-icons opacity-10">table_chart</i>
                </div>
                <span class="nav-link-text ms-1">Tanya Jawab</span>
            </a>
        </li>
        <li class="nav-item mt-3">
            <h6 class="ps-4 ms-2 text-uppercase text-xs text-white font-weight-bolder opacity-8">Halaman Akun</h6>
        </li>
        @auth
            <li class="nav-item">
                <a class="nav-link text-white @if($title === 'profile') active bg-gradient-primary @endif" href="/profile">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">person</i>
                    </div>
                    <span class="nav-link-text ms-1">Profile</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">logout</i>
                    </div>
                    <span class="nav-link-text ms-1">Logout</span>
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </li>
        @endauth
        @guest
            <li class="nav-item">
                <a class="nav-link text-white" href="/login">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">login</i>
                    </div>
                    <span class="nav-link-text ms-1">Login</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" href="/register">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">assignment</i>
                    </div>
                    <span class="nav-link-text ms-1">Register</span>
                </a>
            </li>
        @endguest
    </ul>
</div>
<div class="sidenav-footer position-absolute w-100 bottom-0"></div>
