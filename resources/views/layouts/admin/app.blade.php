<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin') | Jahitkan</title>

    {{-- start css --}}
    @include('layouts.admin.css')
    {{-- end css --}}
</head>

<body>
    <div class="admin-shell">
        <div class="sidebar-backdrop" data-sidebar-close></div>

        {{-- start sidebar --}}
        @include('layouts.admin.sidebar')
        {{-- end sidebar --}}

        <div class="admin-main">
            {{-- start header --}}
            @include('layouts.admin.header')
            {{-- end header --}}

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

                    {{-- start alert (flash data & validasi) --}}
                    @include('layouts.admin.alert')
                    {{-- end alert --}}

                    {{-- start main content --}}
                    @hasSection('plain')
                        @yield('content')
                    @else
                        <section class="panel mt-3">
                            @yield('content')
                        </section>
                    @endif
                    {{-- end main content --}}
                </div>
            </main>

            {{-- start footer --}}
            @include('layouts.admin.footer')
            {{-- end footer --}}
        </div>
    </div>

    {{-- start js --}}
    @include('layouts.admin.js')
    {{-- end js --}}
    @stack('scripts')
</body>

</html>
