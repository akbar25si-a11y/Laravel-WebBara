@extends('admin.layouts.app')
@section('title', 'Tambah Pesanan')
@section('icon', 'bi-bag-check')
@section('heading', 'Tambah Pesanan')
@section('subheading', 'Form untuk menambahkan pesanan baru.')
@section('actions')
  <a href="{{ route('pesanan.index') }}" class="btn btn-primary btn-sm"><i class="bi bi-arrow-left"></i> Kembali</a>
@endsection

@section('content')
<form action="{{ route('pesanan.store') }}" method="POST">
  @csrf
  <div class="row g-3">
    <div class="col-lg-4 col-sm-6">
      <div class="mb-3">
        <label for="pelanggan_id" class="form-label">Pelanggan</label>
        <select id="pelanggan_id" name="pelanggan_id" class="form-select @error('pelanggan_id') is-invalid @enderror">
          <option value="">-- Pilih Pelanggan --</option>
          @foreach ($dataPelanggan as $p)
            <option value="{{ $p->pelanggan_id }}" {{ old('pelanggan_id') == $p->pelanggan_id ? 'selected' : '' }}>{{ $p->first_name }} {{ $p->last_name }}</option>
          @endforeach
        </select>
        @error('pelanggan_id')<div class="text-danger small">{{ $message }}</div>@enderror
      </div>
      <div class="mb-3">
        <label for="jenis_pakaian" class="form-label">Jenis Pakaian</label>
        <input type="text" id="jenis_pakaian" name="jenis_pakaian" class="form-control @error('jenis_pakaian') is-invalid @enderror" value="{{ old('jenis_pakaian') }}">
        @error('jenis_pakaian')<div class="text-danger small">{{ $message }}</div>@enderror
      </div>
      <div class="mb-3">
        <label for="jumlah" class="form-label">Jumlah</label>
        <input type="number" id="jumlah" name="jumlah" min="1" class="form-control @error('jumlah') is-invalid @enderror" value="{{ old('jumlah', '1') }}">
        @error('jumlah')<div class="text-danger small">{{ $message }}</div>@enderror
      </div>
    </div>
    <div class="col-lg-4 col-sm-6">
      <div class="mb-3">
        <label for="harga" class="form-label">Harga (Rp)</label>
        <input type="number" id="harga" name="harga" min="0" step="1000" class="form-control @error('harga') is-invalid @enderror" value="{{ old('harga', '0') }}">
        @error('harga')<div class="text-danger small">{{ $message }}</div>@enderror
      </div>
      <div class="mb-3">
        <label for="tanggal_pesan" class="form-label">Tanggal Pesan</label>
        <input type="date" id="tanggal_pesan" name="tanggal_pesan" class="form-control @error('tanggal_pesan') is-invalid @enderror" value="{{ old('tanggal_pesan') }}">
        @error('tanggal_pesan')<div class="text-danger small">{{ $message }}</div>@enderror
      </div>
      <div class="mb-3">
        <label for="tanggal_selesai" class="form-label">Tanggal Selesai</label>
        <input type="date" id="tanggal_selesai" name="tanggal_selesai" class="form-control @error('tanggal_selesai') is-invalid @enderror" value="{{ old('tanggal_selesai') }}">
        @error('tanggal_selesai')<div class="text-danger small">{{ $message }}</div>@enderror
      </div>
    </div>
    <div class="col-lg-4 col-sm-6">
      <div class="mb-3">
        <label for="status" class="form-label">Status</label>
        <select id="status" name="status" class="form-select @error('status') is-invalid @enderror">
          <option value="Baru" {{ old('status', 'Baru') == 'Baru' ? 'selected' : '' }}>Baru</option>
          <option value="Diproses" {{ old('status', 'Baru') == 'Diproses' ? 'selected' : '' }}>Diproses</option>
          <option value="Selesai" {{ old('status', 'Baru') == 'Selesai' ? 'selected' : '' }}>Selesai</option>
          <option value="Diambil" {{ old('status', 'Baru') == 'Diambil' ? 'selected' : '' }}>Diambil</option>
        </select>
        @error('status')<div class="text-danger small">{{ $message }}</div>@enderror
      </div>
      <div class="mb-3">
        <label for="catatan" class="form-label">Catatan</label>
        <input type="text" id="catatan" name="catatan" class="form-control @error('catatan') is-invalid @enderror" value="{{ old('catatan') }}">
        @error('catatan')<div class="text-danger small">{{ $message }}</div>@enderror
      </div>
    </div>
  </div>
  <div class="mt-3">
    <button type="submit" class="btn btn-primary">Simpan</button>
    <a href="{{ route('pesanan.index') }}" class="btn btn-outline-secondary ms-2">Batal</a>
  </div>
</form>
@endsection
