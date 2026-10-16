<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title', 'Admin') | Jahitkan</title>

  <link rel="stylesheet" href="{{ asset('AdminAssets/css/bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ asset('AdminAssets/vendors/bootstrap-icons/bootstrap-icons.css') }}">
  <link rel="stylesheet" href="{{ asset('AdminAssets/css/style.css') }}">
</head>

<body>
  <div class="admin-shell">
    <div class="sidebar-backdrop" data-sidebar-close></div>

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
      </nav>

      <div class="sidebar-user">
        <img src="{{ asset('AdminAssets/images/logo.jpeg') }}" alt="Logo" width="40" height="40">
        <strong>Admin Hasan</strong>
        <small>Active Workspace</small>
      </div>
    </aside>

    <div class="admin-main">
      <nav class="navbar admin-navbar navbar-expand bg-white">
        <div class="container-fluid px-3 px-lg-4">
          <button class="sidebar-toggle" type="button" data-sidebar-toggle aria-controls="adminSidebar" aria-expanded="true" aria-label="Toggle sidebar">
            <span></span><span></span><span></span>
          </button>
        </div>
      </nav>

      <main class="dashboard-content">
        <div class="container-fluid px-3 px-lg-4 py-4">
          <div class="page-heading">
            <div class="page-heading-copy">
              <span class="page-icon"><i class="bi @yield('icon', 'bi-table')"></i></span>
              <div>
                <h1 class="h3 mb-1">@yield('heading')</h1>
                <p class="text-muted mb-0">@yield('subheading')</p>
              </div>
            </div>
            <div class="heading-actions">@yield('actions')</div>
          </div>

          @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
              {{ session('success') }}
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
          @endif

          @if ($errors->any())
            <div class="alert alert-danger mt-3" role="alert">
              <strong>Terdapat kesalahan pada isian:</strong>
              <ul class="mb-0">
                @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
                @endforeach
              </ul>
            </div>
          @endif

          <section class="panel mt-3">
            @yield('content')
          </section>
        </div>
      </main>

      <footer class="admin-footer">
        <div class="container-fluid px-3 px-lg-4">
          <span>Jahitkan &copy; 2026</span>
        </div>
      </footer>
    </div>
  </div>

  <script src="{{ asset('AdminAssets/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('AdminAssets/js/main.js') }}"></script>
</body>
</html>
