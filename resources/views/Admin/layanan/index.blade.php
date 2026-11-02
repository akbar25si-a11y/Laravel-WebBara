@extends('admin.layouts.app')
@section('title', 'Data Layanan')
@section('icon', 'bi-scissors')
@section('heading', 'Data Layanan')
@section('subheading', 'List layanan jahit (CRUD 1 - Eloquent ORM)')
@section('actions')
  <a href="{{ route('layanan.create') }}" class="btn btn-success btn-sm text-white"><i class="bi bi-plus-lg"></i> Tambah Layanan</a>
@endsection

@section('content')
<div class="table-responsive">
  <table id="table-layanan" class="table align-middle mb-0">
    <thead>
      <tr><th>#</th><th>Nama Layanan</th><th>Kategori</th><th>Harga Mulai</th><th>Estimasi</th><th>Deskripsi</th><th class="text-end">Action</th></tr>
    </thead>
    <tbody>
      @forelse ($dataLayanan as $item)
        <tr>
          <td>{{ $loop->iteration }}</td>
          <td>{{ $item->nama }}</td>
          {{-- $item->kategori = relasi belongsTo di model Layanan --}}
          <td><span class="badge text-bg-secondary">{{ $item->kategori->nama ?? 'Tanpa kategori' }}</span></td>
          <td>Rp {{ number_format($item->harga_mulai, 0, ',', '.') }}</td>
          <td>{{ $item->estimasi_hari }} hari</td>
          <td>{{ \Illuminate\Support\Str::limit($item->deskripsi, 60) }}</td>
          <td class="text-end">
            <a href="{{ route('layanan.edit', $item->layanan_id) }}" class="btn btn-info btn-sm"><i class="bi bi-pencil"></i> Edit</a>
            <form action="{{ route('layanan.destroy', $item->layanan_id) }}" method="POST" style="display:inline" onsubmit="return confirm('Hapus data ini?')">
              @csrf
              @method('DELETE')
              <button type="submit" class="btn btn-danger btn-sm"><i class="bi bi-trash"></i> Hapus</button>
            </form>
          </td>
        </tr>
      @empty
        <tr><td colspan="7" class="text-center text-muted">Belum ada data.</td></tr>
      @endforelse
    </tbody>
  </table>
</div>
@endsection
