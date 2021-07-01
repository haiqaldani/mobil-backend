<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('home') }}">
        <div class="sidebar-brand-text mx-3">
            Mobil Admin
        </div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item">
        <a class="nav-link" href="{{ route('dashboard') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>
    <!-- Nav Item - Pages Collapse Menu -->
    @if (Auth::user()->isAdmin())
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUser"
                aria-expanded="true" aria-controls="collapseUser">
                <i class="fas fa-fw fa-users"></i>
                <span>Users</span>
            </a>
            <div id="collapseUser" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Users</h6>
                    <a class="collapse-item" href="{{ route('user.index') }}">Users</a>
                    <a class="collapse-item" href="{{ route('role.index') }}">Role</a>
                </div>
            </div>
        </li>
    @endif
    <hr class="sidebar-divider">
    <div class="sidebar-heading">
        Interface
    </div>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('banner.index') }}">
            <i class="fas fa-fw fa-image"></i>
            <span>Banner</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('interest-buyer.index') }}">
            <i class="fas fa-fw fa-users"></i>
            <span>Pembeli Berminat</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('promo.index') }}">
            <i class="fas fa-fw fa-certificate"></i>
            <span>Promo</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('favorite.index') }}">
            <i class="fas fa-fw fa-star"></i>
            <span>Favorite</span></a>
    </li>

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseMerk" aria-expanded="true"
            aria-controls="collapseMerl">
            <i class="fas fa-fw fa-square"></i>
            <span>Mobil Baru</span>
        </a>
        <div id="collapseMerk" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Merk</h6>
                <a class="collapse-item" href="{{ route('merk.index') }}">Merk</a>
                <a class="collapse-item" href="{{ route('car-model.index') }}">Model Mobil</a>
                <a class="collapse-item" href="{{ route('car-variant.index') }}">Varian Mobil</a>
                <a class="collapse-item" href="{{ route('color.index') }}">Warna Mobil</a>
                <h6 class="collapse-header">Foto</h6>
                <a class="collapse-item" href="{{ route('car-gallery.index') }}">Foto Mobil</a>
                <div class="collapse-divider"></div>
            </div>
        </div>
    </li>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseMobil" aria-expanded="true"
            aria-controls="collapseMobil">
            <i class="fas fa-fw fa-car"></i>
            <span>Mobil Bekas</span>
        </a>
        <div id="collapseMobil" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Mobil</h6>
                <a class="collapse-item" href="{{ route('car-type.index') }}">Kategori Mobil</a>
                <a class="collapse-item" href="{{ route('car.index') }}">Mobil</a>
                <a class="collapse-item" href="{{ route('vehicle-feature.index') }}">Fitur Mobil</a>
                <h6 class="collapse-header">Foto</h6>
                <a class="collapse-item" href="{{ route('gallery.index') }}">Foto Mobil</a>
                <div class="collapse-divider"></div>
            </div>
        </div>
    </li>

    {{-- <li class="nav-item">
        <a class="nav-link" href="{{ route('car.index') }}">
            <i class="fas fa-fw fa-car"></i>
            <span>Mobil</span></a>
    </li> --}}

    <hr class="sidebar-divider">
    @if (Auth::user()->isAdmin())
        <div class="sidebar-heading">
            Aktivitas
        </div>
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
                aria-expanded="true" aria-controls="collapsePages">
                <i class="fas fa-fw fa-eye"></i>
                <span>Aktivitas</span>
            </a>
            <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Aktivitas</h6>
                    <a class="collapse-item" href="{{ route('activity-log.index') }}">User</a>
                    <a class="collapse-item" href="{{ route('activity-login.index') }}">Login</a>
                </div>
            </div>
        </li>
        <hr class="sidebar-divider">
    @endif

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->
