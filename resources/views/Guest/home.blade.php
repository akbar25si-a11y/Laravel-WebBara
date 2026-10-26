@extends('layouts.guest.app')

@section('title', 'Home | Jahitkan')

@section('content')
<div class="hero_section">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-6">
                <h1>Jahitkan <span style="color:#2ea0f8;">Jasa Jahit UMKM</span></h1>
                <p class="mt-3 mb-4">Pesan jahitan dengan mudah, ukur sesuai badan, dan pantau pesanan Anda dalam satu tempat.</p>
                <a href="{{ url('/auth') }}" class="btn btn-primary">Login</a>
                <a href="{{ url('/register') }}" class="btn btn-outline-dark">Register</a>
            </div>
            <div class="col-md-6">
                <img src="{{ asset('GuestAssets/images/bajubatik.jpg') }}" alt="Baju Batik" class="img-fluid rounded">
            </div>
        </div>
    </div>
</div>
@endsection
