<nav class="pcoded-navbar">
    <div class="navbar-wrapper">
        <div class="navbar-content scroll-div">

            {{-- Profil Pengguna --}}
            @auth
                <div class="main-menu-header" style="padding: 1rem; display: flex; align-items: center;">
                    <img class="img-radius" src="{{ asset('back-end/images/user/avatar-2.jpg') }}" alt="User-Profile-Image" style="width: 50px; height: 50px; border-radius: 50%;">
                    <div class="user-details" style="margin-left: 1rem; cursor: pointer;" onclick="document.getElementById('nav-user-link').classList.toggle('hidden')">
                        <span style="font-weight: bold;">{{ strtoupper(Auth::user()->level) }}</span>
                        <div id="more-details" style="display: flex; justify-content: space-between; font-size: 0.9rem;">
                            <span>{{ Auth::user()->name }}</span>
                           
                        </div>
                    </div>
                </div>

                {{-- Menu Sidebar --}}
                @if (Auth::user()->level === 'admin')
                <ul class="nav pcoded-inner-navbar">
                    <li class="nav-item pcoded-menu-caption">
                        <label>Dashboard</label>
                    </li>


                    <li class="nav-item">
                        <a href="{{ route('admin.index') }}" class="nav-link">
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
                        <a href="{{ route('kategori_berita.index') }}" class="nav-link">
                            <span class="pcoded-micon"><i class="feather icon-home"></i></span>
                            <span class="pcoded-mtext">Kategori Berita</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('kategori_wisata.index') }}" class="nav-link">
                            <span class="pcoded-micon"><i class="feather icon-home"></i></span>
                            <span class="pcoded-mtext">Kategori Wisata</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('penginapan.index') }}" class="nav-link">
                            <span class="pcoded-micon"><i class="feather icon-home"></i></span>
                            <span class="pcoded-mtext">Penginapan</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('paket_wisata.index') }}" class="nav-link">
                            <span class="pcoded-micon"><i class="feather icon-home"></i></span>
                            <span class="pcoded-mtext">Paket Wisata</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('obyek_wisata.index') }}" class="nav-link">
                            <span class="pcoded-micon"><i class="feather icon-home"></i></span>
                            <span class="pcoded-mtext">Obyek Wisata</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('reservasi.index') }}" class="nav-link">
                            <span class="pcoded-micon"><i class="feather icon-home"></i></span>
                            <span class="pcoded-mtext">Reservasi</span>
                        </a>
                    </li>





                {{-- Menu untuk role lainnya --}}
                @elseif (Auth::user()->level === 'bendahara')
                <ul class="nav pcoded-inner-navbar">
                    <li class="nav-item pcoded-menu-caption">
                        <label>Dashboard</label>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.index') }}" class="nav-link"><span class="pcoded-micon"><i class="feather icon-home"></i></span><span class="pcoded-mtext">Dashboard User</span></a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('reservasi.index') }}" class="nav-link"><span class="pcoded-micon"><i class="feather icon-home"></i></span><span class="pcoded-mtext">reservasi</span></a>
                    </li>
                </ul>
                @endif
            @endauth
        </div>
    </div>
</nav>

