<div class="header_section">
    <div class="container-fluid">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="{{ url('/') }}">
                <img src="{{ asset('AdminAssets/images/Logo.jpeg') }}" width="100" alt="Logo">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#guestNav"
                aria-controls="guestNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="guestNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item {{ request()->is('/') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ url('/') }}">Home</a>
                    </li>
                    <li class="nav-item {{ request()->is('auth') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ url('/auth') }}">Login</a>
                    </li>
                    <li class="nav-item {{ request()->is('register') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ url('/register') }}">Register</a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</div>
