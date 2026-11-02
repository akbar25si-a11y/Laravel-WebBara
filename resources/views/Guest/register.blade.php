@extends('layouts.guest.app')

@section('title', 'Register | Jahitkan')

@section('content')
<div class="auth_section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-5">
                <div class="auth_card">
                    <h2>Register</h2>

                    @include('layouts.guest.alert')

                    <form action="{{ url('/register') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" id="name" name="name" class="form-control"
                                value="{{ old('name') }}" placeholder="Name" required autofocus>
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" id="email" name="email" class="form-control"
                                value="{{ old('email') }}" placeholder="Email" required>
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" id="password" name="password" class="form-control"
                                placeholder="Password" required>
                        </div>
                        <div class="form-group">
                            <label for="password_confirmation">Confirm Password</label>
                            <input type="password" id="password_confirmation" name="password_confirmation"
                                class="form-control" placeholder="Confirm Password" required>
                        </div>
                        <button type="submit" class="btn btn-auth">Register</button>
                    </form>

                    <p class="mt-3 mb-0 text-center">Sudah punya akun? <a href="{{ url('/auth') }}">Login</a></p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
