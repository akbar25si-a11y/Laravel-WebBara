@extends('admin.layouts.app')
@section('title', 'Edit Ukuran Pelanggan')
@section('icon', 'bi-rulers')
@section('heading', 'Edit Ukuran Pelanggan')
@section('subheading', 'Form untuk mengubah ukuran pelanggan.')
@section('actions')
  <a href="{{ route('ukuran.index') }}" class="btn btn-primary btn-sm"><i class="bi bi-arrow-left"></i> Kembali</a>
@endsection

@section('content')
<form action="{{ route('ukuran.update', $dataUkuran->ukuran_id) }}" method="POST">
  @csrf
  @method('PUT')
  <div class="row g-3">
    <div class="col-lg-4 col-sm-6">
      <div class="mb-3">
        <label for="pelanggan_id" class="form-label">Pelanggan</label>
        <select id="pelanggan_id" name="pelanggan_id" class="form-select @error('pelanggan_id') is-invalid @enderror">
          <option value="">-- Pilih Pelanggan --</option>
          @foreach ($dataPelanggan as $p)
            <option value="{{ $p->pelanggan_id }}" {{ old('pelanggan_id', $dataUkuran->pelanggan_id) == $p->pelanggan_id ? 'selected' : '' }}>{{ $p->first_name }} {{ $p->last_name }}</option>
          @endforeach
        </select>
        @error('pelanggan_id')<div class="text-danger small">{{ $message }}</div>@enderror
      </div>
      <div class="mb-3">
        <label for="lingkar_dada" class="form-label">Lingkar Dada (cm)</label>
        <input type="number" id="lingkar_dada" name="lingkar_dada" step="0.1" min="0" class="form-control @error('lingkar_dada') is-invalid @enderror" value="{{ old('lingkar_dada', $dataUkuran->lingkar_dada) }}">
        @error('lingkar_dada')<div class="text-danger small">{{ $message }}</div>@enderror
      </div>
      <div class="mb-3">
        <label for="lingkar_pinggang" class="form-label">Lingkar Pinggang (cm)</label>
        <input type="number" id="lingkar_pinggang" name="lingkar_pinggang" step="0.1" min="0" class="form-control @error('lingkar_pinggang') is-invalid @enderror" value="{{ old('lingkar_pinggang', $dataUkuran->lingkar_pinggang) }}">
        @error('lingkar_pinggang')<div class="text-danger small">{{ $message }}</div>@enderror
      </div>
    </div>
    <div class="col-lg-4 col-sm-6">
      <div class="mb-3">
        <label for="lingkar_pinggul" class="form-label">Lingkar Pinggul (cm)</label>
        <input type="number" id="lingkar_pinggul" name="lingkar_pinggul" step="0.1" min="0" class="form-control @error('lingkar_pinggul') is-invalid @enderror" value="{{ old('lingkar_pinggul', $dataUkuran->lingkar_pinggul) }}">
        @error('lingkar_pinggul')<div class="text-danger small">{{ $message }}</div>@enderror
      </div>
      <div class="mb-3">
        <label for="panjang_baju" class="form-label">Panjang Baju (cm)</label>
        <input type="number" id="panjang_baju" name="panjang_baju" step="0.1" min="0" class="form-control @error('panjang_baju') is-invalid @enderror" value="{{ old('panjang_baju', $dataUkuran->panjang_baju) }}">
        @error('panjang_baju')<div class="text-danger small">{{ $message }}</div>@enderror
      </div>
      <div class="mb-3">
        <label for="panjang_lengan" class="form-label">Panjang Lengan (cm)</label>
        <input type="number" id="panjang_lengan" name="panjang_lengan" step="0.1" min="0" class="form-control @error('panjang_lengan') is-invalid @enderror" value="{{ old('panjang_lengan', $dataUkuran->panjang_lengan) }}">
        @error('panjang_lengan')<div class="text-danger small">{{ $message }}</div>@enderror
      </div>
    </div>
    <div class="col-lg-4 col-sm-6">
      <div class="mb-3">
        <label for="lebar_bahu" class="form-label">Lebar Bahu (cm)</label>
        <input type="number" id="lebar_bahu" name="lebar_bahu" step="0.1" min="0" class="form-control @error('lebar_bahu') is-invalid @enderror" value="{{ old('lebar_bahu', $dataUkuran->lebar_bahu) }}">
        @error('lebar_bahu')<div class="text-danger small">{{ $message }}</div>@enderror
      </div>
      <div class="mb-3">
        <label for="panjang_celana" class="form-label">Panjang Celana (cm)</label>
        <input type="number" id="panjang_celana" name="panjang_celana" step="0.1" min="0" class="form-control @error('panjang_celana') is-invalid @enderror" value="{{ old('panjang_celana', $dataUkuran->panjang_celana) }}">
        @error('panjang_celana')<div class="text-danger small">{{ $message }}</div>@enderror
      </div>
      <div class="mb-3">
        <label for="catatan" class="form-label">Catatan</label>
        <input type="text" id="catatan" name="catatan" class="form-control @error('catatan') is-invalid @enderror" value="{{ old('catatan', $dataUkuran->catatan) }}">
        @error('catatan')<div class="text-danger small">{{ $message }}</div>@enderror
      </div>
    </div>
  </div>
  <div class="mt-3">
    <button type="submit" class="btn btn-info">Simpan Perubahan</button>
    <a href="{{ route('ukuran.index') }}" class="btn btn-outline-secondary ms-2">Batal</a>
  </div>
</form>
@endsection
