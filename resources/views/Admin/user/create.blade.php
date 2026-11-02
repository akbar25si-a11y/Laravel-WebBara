@extends('layouts.admin.app')
@section('title', 'Tambah User')
@section('icon', 'bi-person-gear')
@section('heading', 'Tambah User')
@section('subheading', 'Form untuk menambahkan data user baru.')
@section('actions')
  <a href="{{ route('user.index') }}" class="btn btn-primary btn-sm"><i class="bi bi-arrow-left"></i> Kembali</a>
@endsection

@section('content')
<form action="{{ route('user.store') }}" method="POST">
  @csrf
  <div class="row g-3">
    <div class="col-lg-6 col-sm-12">
      <div class="mb-3">
        <label for="name" class="form-label">Name</label>
        <input type="text" id="name" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}">
        @error('name')<div class="text-danger small">{{ $message }}</div>@enderror
      </div>
      <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="text" id="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}">
        @error('email')<div class="text-danger small">{{ $message }}</div>@enderror
      </div>
    </div>
    <div class="col-lg-6 col-sm-12">
      <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <input type="password" id="password" name="password" class="form-control @error('password') is-invalid @enderror">
        @error('password')<div class="text-danger small">{{ $message }}</div>@enderror
      </div>
      <div class="mb-3">
        <label for="password_confirmation" class="form-label">Confirm Password</label>
        <input type="password" id="password_confirmation" name="password_confirmation" class="form-control">
      </div>
      <button type="submit" class="btn btn-primary">Simpan</button>
      <a href="{{ route('user.index') }}" class="btn btn-outline-secondary ms-2">Batal</a>
    </div>
  </div>
</form>
@endsection
