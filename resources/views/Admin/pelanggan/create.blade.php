@extends('layouts.admin.app')
@section('title', 'Tambah Pelanggan')
@section('icon', 'bi-people')
@section('heading', 'Tambah Pelanggan')
@section('subheading', 'Form untuk menambahkan data pelanggan baru.')
@section('actions')
  <a href="{{ route('pelanggan.index') }}" class="btn btn-primary btn-sm"><i class="bi bi-arrow-left"></i> Kembali</a>
@endsection

@section('content')
<form action="{{ route('pelanggan.store') }}" method="POST">
  @csrf
  <div class="row g-3">
    <div class="col-lg-4 col-sm-6">
      <div class="mb-3">
        <label for="first_name" class="form-label">First name</label>
        <input type="text" id="first_name" name="first_name" class="form-control @error('first_name') is-invalid @enderror" value="{{ old('first_name') }}">
        @error('first_name')<div class="text-danger small">{{ $message }}</div>@enderror
      </div>
      <div class="mb-3">
        <label for="last_name" class="form-label">Last name</label>
        <input type="text" id="last_name" name="last_name" class="form-control @error('last_name') is-invalid @enderror" value="{{ old('last_name') }}">
        @error('last_name')<div class="text-danger small">{{ $message }}</div>@enderror
      </div>
    </div>
    <div class="col-lg-4 col-sm-6">
      <div class="mb-3">
        <label for="birthday" class="form-label">Birthday</label>
        <input type="date" id="birthday" name="birthday" class="form-control @error('birthday') is-invalid @enderror" value="{{ old('birthday') }}">
        @error('birthday')<div class="text-danger small">{{ $message }}</div>@enderror
      </div>
      <div class="mb-3">
        <label for="gender" class="form-label">Gender</label>
        <select id="gender" name="gender" class="form-select @error('gender') is-invalid @enderror">
          <option value="">-- Pilih --</option>
          <option value="Male" {{ old('gender') == 'Male' ? 'selected' : '' }}>Male</option>
          <option value="Female" {{ old('gender') == 'Female' ? 'selected' : '' }}>Female</option>
        </select>
        @error('gender')<div class="text-danger small">{{ $message }}</div>@enderror
      </div>
    </div>
    <div class="col-lg-4 col-sm-12">
      <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="text" id="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}">
        @error('email')<div class="text-danger small">{{ $message }}</div>@enderror
      </div>
      <div class="mb-3">
        <label for="phone" class="form-label">Phone</label>
        <input type="text" id="phone" name="phone" class="form-control @error('phone') is-invalid @enderror" value="{{ old('phone') }}">
        @error('phone')<div class="text-danger small">{{ $message }}</div>@enderror
      </div>
      <button type="submit" class="btn btn-primary">Simpan</button>
      <a href="{{ route('pelanggan.index') }}" class="btn btn-outline-secondary ms-2">Batal</a>
    </div>
  </div>
</form>
@endsection
