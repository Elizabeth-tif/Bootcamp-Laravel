<nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur"
    navbar-scroll="true">
    <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">
            <h6 class="font-weight-bolder mb-0">
                @php
                    if ($title == 'dashboard') {
                        echo 'Dashboard';
                    }elseif ($title == 'version') {
                        echo 'Versi Laravel';
                    }elseif ($title == 'tanyajawab') {
                        echo 'Tanya Jawab';
                    }elseif ($title == 'profile') {
                        echo 'Profile';
                    }
                @endphp
            </h6>
        </nav>
        <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
            <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                <div class="input-group input-group-outline"></div>
            </div>
            <ul class="navbar-nav justify-content-end">
                <li class="nav-item d-flex align-items-center">
                    @auth
                        <a href="/profile" class="nav-link text-body font-weight-bold px-0">
                            <i class="fa fa-user me-sm-1"></i>
                            <span class="d-sm-inline d-none">{{ Auth::user()->username }}</span>
                        </a>
                    @endauth
                    @guest
                        <a href="/login" class="nav-link text-body font-weight-bold px-0">
                            <i class="fas fa-sign-in-alt me-sm-1"></i>
                            <span class="d-sm-inline d-none">Login</span>
                        </a>
                    @endguest
                </li>
                <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
                    <a href="javascript:;" class="nav-link text-body p-0" id="iconNavbarSidenav">
                        <div class="sidenav-toggler-inner">
                            <i class="sidenav-toggler-line"></i>
                            <i class="sidenav-toggler-line"></i>
                            <i class="sidenav-toggler-line"></i>
                        </div>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>
