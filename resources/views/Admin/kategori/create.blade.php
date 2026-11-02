@extends('layouts.admin.app')
@section('title', 'Tambah Kategori')
@section('icon', 'bi-tags')
@section('heading', 'Tambah Kategori')
@section('subheading', 'Form untuk menambahkan kategori layanan baru.')
@section('actions')
  <a href="{{ route('kategori.index') }}" class="btn btn-primary btn-sm"><i class="bi bi-arrow-left"></i> Kembali</a>
@endsection

@section('content')
<form action="{{ route('kategori.store') }}" method="POST">
  @csrf
  <div class="row g-3">
    <div class="col-lg-6 col-sm-12">
      <div class="mb-3">
        <label for="nama" class="form-label">Nama Kategori</label>
        <input type="text" id="nama" name="nama" class="form-control @error('nama') is-invalid @enderror" value="{{ old('nama') }}">
        @error('nama')<div class="text-danger small">{{ $message }}</div>@enderror
      </div>
      <div class="mb-3">
        <label for="deskripsi" class="form-label">Deskripsi</label>
        <input type="text" id="deskripsi" name="deskripsi" class="form-control @error('deskripsi') is-invalid @enderror" value="{{ old('deskripsi') }}">
        @error('deskripsi')<div class="text-danger small">{{ $message }}</div>@enderror
      </div>
      <button type="submit" class="btn btn-primary">Simpan</button>
      <a href="{{ route('kategori.index') }}" class="btn btn-outline-secondary ms-2">Batal</a>
    </div>
  </div>
</form>
@endsection
