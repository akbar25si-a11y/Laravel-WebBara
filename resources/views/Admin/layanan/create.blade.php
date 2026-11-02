@extends('layouts.admin.app')
@section('title', 'Tambah Layanan')
@section('icon', 'bi-scissors')
@section('heading', 'Tambah Layanan')
@section('subheading', 'Form untuk menambahkan layanan jahit baru.')
@section('actions')
  <a href="{{ route('layanan.index') }}" class="btn btn-primary btn-sm"><i class="bi bi-arrow-left"></i> Kembali</a>
@endsection

@section('content')
<form action="{{ route('layanan.store') }}" method="POST">
  @csrf
  <div class="row g-3">
    <div class="col-lg-6 col-sm-12">
      <div class="mb-3">
        <label for="nama" class="form-label">Nama Layanan</label>
        <input type="text" id="nama" name="nama" class="form-control @error('nama') is-invalid @enderror" value="{{ old('nama') }}">
        @error('nama')<div class="text-danger small">{{ $message }}</div>@enderror
      </div>
      <div class="mb-3">
        <label for="kategori_id" class="form-label">Kategori</label>
        <select id="kategori_id" name="kategori_id" class="form-select @error('kategori_id') is-invalid @enderror">
          <option value="">-- Pilih Kategori --</option>
          @foreach ($dataKategori as $k)
            <option value="{{ $k->kategori_id }}" {{ old('kategori_id') == $k->kategori_id ? 'selected' : '' }}>{{ $k->nama }}</option>
          @endforeach
        </select>
        @error('kategori_id')<div class="text-danger small">{{ $message }}</div>@enderror
      </div>
      <div class="mb-3">
        <label for="deskripsi" class="form-label">Deskripsi</label>
        <textarea id="deskripsi" name="deskripsi" rows="4" class="form-control @error('deskripsi') is-invalid @enderror">{{ old('deskripsi') }}</textarea>
        @error('deskripsi')<div class="text-danger small">{{ $message }}</div>@enderror
      </div>
    </div>
    <div class="col-lg-6 col-sm-12">
      <div class="mb-3">
        <label for="harga_mulai" class="form-label">Harga Mulai (Rp)</label>
        <input type="number" id="harga_mulai" name="harga_mulai" min="0" class="form-control @error('harga_mulai') is-invalid @enderror" value="{{ old('harga_mulai') }}">
        @error('harga_mulai')<div class="text-danger small">{{ $message }}</div>@enderror
      </div>
      <div class="mb-3">
        <label for="estimasi_hari" class="form-label">Estimasi Pengerjaan (hari)</label>
        <input type="number" id="estimasi_hari" name="estimasi_hari" min="1" class="form-control @error('estimasi_hari') is-invalid @enderror" value="{{ old('estimasi_hari', 7) }}">
        @error('estimasi_hari')<div class="text-danger small">{{ $message }}</div>@enderror
      </div>
      <button type="submit" class="btn btn-primary">Simpan</button>
      <a href="{{ route('layanan.index') }}" class="btn btn-outline-secondary ms-2">Batal</a>
    </div>
  </div>
</form>
@endsection
