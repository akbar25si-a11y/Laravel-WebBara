<aside class="admin-sidebar" id="adminSidebar" aria-label="Main navigation">
    <div class="sidebar-header">
        <a class="brand-mark" href="{{ route('dashboard') }}">
            <img src="{{ asset('AdminAssets/images/logo.jpeg') }}" alt="Logo" width="40" height="40">
            <span class="brand-copy">
                <span class="brand-title">Jahitkan</span>
                <span class="brand-subtitle">Jasa Jahit UMKM</span>
            </span>
        </a>
    </div>

    <nav class="sidebar-nav">
        <a class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}" href="{{ route('dashboard') }}">
            <span class="nav-icon"><i class="bi bi-speedometer2"></i></span>
            <span class="nav-text">Dashboard</span>
        </a>
        <a class="nav-link {{ request()->routeIs('pelanggan.*') ? 'active' : '' }}" href="{{ route('pelanggan.index') }}">
            <span class="nav-icon"><i class="bi bi-people"></i></span>
            <span class="nav-text">Data Pelanggan</span>
        </a>
        <a class="nav-link {{ request()->routeIs('ukuran.*') ? 'active' : '' }}" href="{{ route('ukuran.index') }}">
            <span class="nav-icon"><i class="bi bi-rulers"></i></span>
            <span class="nav-text">Ukuran Pelanggan</span>
        </a>
        <a class="nav-link {{ request()->routeIs('pesanan.*') ? 'active' : '' }}" href="{{ route('pesanan.index') }}">
            <span class="nav-icon"><i class="bi bi-bag-check"></i></span>
            <span class="nav-text">Data Pesanan</span>
        </a>
        <a class="nav-link {{ request()->routeIs('user.*') ? 'active' : '' }}" href="{{ route('user.index') }}">
            <span class="nav-icon"><i class="bi bi-person-gear"></i></span>
            <span class="nav-text">Data User</span>
        </a>
    </nav>

    <div class="sidebar-user">
        <img src="{{ asset('AdminAssets/images/logo.jpeg') }}" alt="Logo" width="40" height="40">
        <strong>Admin Bara</strong>
        <small>Active Workspace</small>
    </div>

    <div class="sidebar-footer">
        <span class="status-dot"></span>
        <span class="sidebar-footer-text">System running smoothly</span>
    </div>
</aside>
