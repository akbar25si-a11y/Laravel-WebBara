@extends('layouts.guest.app')

@section('title', 'Login | Jahitkan')

@section('content')
<div class="auth_section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-5">
                <div class="auth_card">
                    <h2>Login</h2>

                    @include('layouts.guest.alert')

                    <form action="{{ url('/auth') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" id="username" name="username" class="form-control"
                                value="{{ old('username') }}" placeholder="Username" required autofocus>
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" id="password" name="password" class="form-control"
                                placeholder="Password" required>
                        </div>
                        <button type="submit" class="btn btn-auth">Login</button>
                    </form>

                    <p class="mt-3 mb-0 text-center">Belum punya akun? <a href="{{ url('/register') }}">Register</a></p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
