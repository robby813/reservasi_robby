<nav class="pcoded-navbar">
    <div class="navbar-wrapper">
        <div class="navbar-content scroll-div">

            <div class="">
                <div class="main-menu-header">
                    <img class="img-radius" src="{{ asset('back-end/images/user/avatar-2.jpg') }}" alt="User-Profile-Image">
                    <div class="user-details">
                        <span>ADMIN</span>
                        <div id="more-details">admin<i class="fa fa-chevron-down m-l-5"></i></div>
                    </div>
                </div>
                <div class="collapse" id="nav-user-link">
                    <ul class="list-unstyled">
                        <li class="list-group-item"><a href="{{ asset('user-profile.html') }}"><i class="feather icon-user m-r-5"></i>View Profile</a></li>
                        <li class="list-group-item"><a href="#!"><i class="feather icon-settings m-r-5"></i>Settings</a></li>
                        <li class="list-group-item"><a href="{{ asset('auth-normal-sign-in.html') }}"><i class="feather icon-log-out m-r-5"></i>Logout</a></li>
                    </ul>
                </div>
            </div>

            <ul class="nav pcoded-inner-navbar">
                <li class="nav-item">
                    <a href="{{ url('/admin') }}" class="nav-link">
                        <span class="pcoded-micon"><i class="feather icon-home"></i></span>
                        <span class="pcoded-mtext">Dashboard</span>
                    </a>
                </li>
                <li class="nav-item pcoded-hasmenu">
                    <a href="#" class="nav-link">
                        <span class="pcoded-micon"><i class="feather icon-users"></i></span>
                        <span class="pcoded-mtext">User</span>
                    </a>
                    <ul class="pcoded-submenu">
                        <li><a href="{{ route('karyawan.index') }}">Karyawan</a></li>
                        <li><a href="{{ route('pelanggan.index') }}">Pelanggan</a></li>

                    </ul>
                </li>

                <li class="nav-item">
                    <a href="{{ url('/kategori_wisata') }}" class="nav-link">
                        <span class="pcoded-micon"><i class="feather icon-home"></i></span>
                        <span class="pcoded-mtext">Kategori Wisata</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('/kategori_berita') }}" class="nav-link">
                        <span class="pcoded-micon"><i class="feather icon-home"></i></span>
                        <span class="pcoded-mtext">Kategori Berita</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('paket_wisata.index') }}" class="nav-link">
                        <span class="pcoded-micon"><i class="feather icon-home"></i></span>
                        <span class="pcoded-mtext">Paket wisata</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('obyek_wisata.index') }}" class="nav-link">
                        <span class="pcoded-micon"><i class="feather icon-home"></i></span>
                        <span class="pcoded-mtext">Obyek Wisata</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('penginapan.index') }}" class="nav-link">
                        <span class="pcoded-micon"><i class="feather icon-home"></i></span>
                        <span class="pcoded-mtext">Penginapan</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('berita.index') }}" class="nav-link">
                        <span class="pcoded-micon"><i class="feather icon-home"></i></span>
                        <span class="pcoded-mtext">Berita</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('reservasi.index') }}" class="nav-link">
                        <span class="pcoded-micon"><i class="feather icon-home"></i></span>
                        <span class="pcoded-mtext">Reservasi Desa </span>
                    </a>
                </li>
            </ul>

            <div class="card text-center">
                <div class="card-block">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <i class="feather icon-sunset f-40"></i>
                    <h6 class="mt-3">Upgrade To Pro</h6>
                    <p>Please contact us on our email for need any support</p>
                    <a href="https://1.envato.market/PgJNQ" target="_blank" class="btn btn-primary btn-sm text-white m-0">Upgrade</a>
                </div>
            </div>

        </div>
    </div>
</nav>
