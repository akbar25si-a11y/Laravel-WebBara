@extends('layouts.admin.app')
@section('title', 'Kategori Layanan')
@section('icon', 'bi-tags')
@section('heading', 'Kategori Layanan')
@section('subheading', 'List kategori layanan (CRUD 2 - Query Builder)')
@section('actions')
  <a href="{{ route('kategori.create') }}" class="btn btn-success btn-sm text-white"><i class="bi bi-plus-lg"></i> Tambah Kategori</a>
@endsection

@section('content')
<div class="table-responsive">
  <table id="table-kategori" class="table align-middle mb-0">
    <thead>
      <tr><th>#</th><th>Nama</th><th>Slug</th><th>Deskripsi</th><th>Jumlah Layanan</th><th class="text-end">Action</th></tr>
    </thead>
    <tbody>
      @forelse ($dataKategori as $item)
        <tr>
          <td>{{ $loop->iteration }}</td>
          <td>{{ $item->nama }}</td>
          <td><code>{{ $item->slug }}</code></td>
          <td>{{ $item->deskripsi }}</td>
          {{-- total_layanan berasal dari COUNT() + leftJoin di controller --}}
          <td><span class="badge text-bg-secondary">{{ $item->total_layanan }}</span></td>
          <td class="text-end">
            <a href="{{ route('kategori.edit', $item->kategori_id) }}" class="btn btn-info btn-sm"><i class="bi bi-pencil"></i> Edit</a>
            <form action="{{ route('kategori.destroy', $item->kategori_id) }}" method="POST" style="display:inline" onsubmit="return confirm('Hapus kategori ini? Layanan di dalamnya akan menjadi tanpa kategori.')">
              @csrf
              @method('DELETE')
              <button type="submit" class="btn btn-danger btn-sm"><i class="bi bi-trash"></i> Hapus</button>
            </form>
          </td>
        </tr>
      @empty
        <tr><td colspan="6" class="text-center text-muted">Belum ada data.</td></tr>
      @endforelse
    </tbody>
  </table>
</div>
@endsection
