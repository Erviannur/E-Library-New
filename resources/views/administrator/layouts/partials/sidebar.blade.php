
<div class="sidebar" id="sidebar">
    <div class="sidebar-inner slimscroll">
        <div id="sidebar-menu" class="sidebar-menu">
            <ul>
                <li class="menu-title">
                    <span>Menu</span>
                </li>
                @if (auth()->user()->role->name == 'Administrator' )
                    <li class="{{ (request()->is('apps/dashboard*')) ? 'active' : '' }}">
                        <a href="{{ route('apps.dashboard')}}"><i class="fas fa-home"></i> <span>Beranda</span></a>
                    </li>
                    <li class="menu-title">
                        <span>Menu Pengunjung</span>
                    </li>
                @endif

                @if (auth()->user()->role->name == 'Anggota' || auth()->user()->role->name == 'Administrator' )
                    <li class="{{ (request()->is('apps/profile*')) ? 'active' : '' }}">
                        <a href="{{ route('guest.profile')}}"><i class="fas fa-user"></i> <span>Profil</span></a>
                    </li>
                    <li class="{{ (request()->is('apps/collections*')) ? 'active' : '' }}">
                        <a href="{{ route('guest.books')}}"><i class="fas fa-book"></i> <span>Buku</span></a>
                    </li>
                    <li class="{{ (request()->is('apps/bookmarks*')) ? 'active' : '' }}">
                        <a href="{{ route('guest.bookmarks') }}"><i class="fas fa-bookmark"></i> <span>Penanda</span></a>
                    </li>
                @endif

                @if (auth()->user()->role->name == 'Administrator' )
                <li class="menu-title">
                    <span>Data</span>
                </li>
                <li class="submenu {{ (
                    request()->is('apps/genre*') ||
                    request()->is('apps/authors*')
                ) ? 'active' : '' }}">

                    <a href="#"><i class="feather-grid"></i> <span> Master Data</span> <span class="menu-arrow"></span></a>
                    <ul>
                      <li><a href="{{ route('apps.genre')}}" class="{{ (request()->is('apps/genre*')) ? 'active' : '' }}">Genre</a></li>
                      <li><a href="{{ route('apps.authors')}}" class="{{ (request()->is('apps/authors*')) ? 'active' : '' }}">Penulis</a></li>
                      <li><a href="{{ route('apps.publishers')}} " class="{{ (request()->is('apps/publishers*')) ? 'active' : '' }}">Penerbit</a></li>
                      <li><a href="{{ route('apps.books')}} " class="{{ (request()->is('apps/books*')) ? 'active' : '' }}">Buku</a></li>
                    </ul>
                  </li>
                <li class="{{ (request()->is('apps/activities*')) ? 'active' : '' }}">
                    <a href="{{ route('apps.activity')}}"><i class="fas fa-tasks"></i> <span>Aktivitas</span></a>
                </li>
                <li class="menu-title">
                    <span>Penagaturan</span>
                </li>
                <li class="{{ (request()->is('apps/users*')) ? 'active' : '' }}">
                    <a href="#"><i class="fas fa-users"></i> <span>Pengguna</span></a>
                </li>
                <li class="{{ (request()->is('apps/home*')) ? 'active' : '' }}">
                    <a href="#"><i class="fas fa-tv"></i> <span>Tampilan Awal</span></a>
                </li>
                @endif
            </ul>
        </div>
    </div>
</div>
