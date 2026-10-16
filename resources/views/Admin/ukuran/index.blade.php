@extends('admin.layouts.app')
@section('title', 'Ukuran Pelanggan')
@section('icon', 'bi-rulers')
@section('heading', 'Ukuran Pelanggan')
@section('subheading', 'List ukuran badan seluruh pelanggan')
@section('actions')
  <a href="{{ route('ukuran.create') }}" class="btn btn-success btn-sm text-white"><i class="bi bi-plus-lg"></i> Tambah Ukuran</a>
@endsection

@section('content')
<div class="table-responsive">
  <table id="table-ukuran" class="table align-middle mb-0">
    <thead>
      <tr><th>Pelanggan</th><th>Dada</th><th>Pinggang</th><th>Pinggul</th><th>P. Baju</th><th>P. Lengan</th><th>Bahu</th><th>P. Celana</th><th>Catatan</th><th class="text-end">Action</th></tr>
    </thead>
    <tbody>
      @forelse ($dataUkuran as $item)
        <tr>
          <td>{{ $item->pelanggan->first_name ?? '-' }} {{ $item->pelanggan->last_name ?? '' }}</td>
          <td>{{ $item->lingkar_dada }}</td>
          <td>{{ $item->lingkar_pinggang }}</td>
          <td>{{ $item->lingkar_pinggul }}</td>
          <td>{{ $item->panjang_baju }}</td>
          <td>{{ $item->panjang_lengan }}</td>
          <td>{{ $item->lebar_bahu }}</td>
          <td>{{ $item->panjang_celana }}</td>
          <td>{{ $item->catatan }}</td>
          <td class="text-end">
            <a href="{{ route('ukuran.edit', $item->ukuran_id) }}" class="btn btn-info btn-sm"><i class="bi bi-pencil"></i> Edit</a>
            <form action="{{ route('ukuran.destroy', $item->ukuran_id) }}" method="POST" style="display:inline" onsubmit="return confirm('Hapus data ini?')">
              @csrf
              @method('DELETE')
              <button type="submit" class="btn btn-danger btn-sm"><i class="bi bi-trash"></i> Hapus</button>
            </form>
          </td>
        </tr>
      @empty
        <tr><td colspan="10" class="text-center text-muted">Belum ada data.</td></tr>
      @endforelse
    </tbody>
  </table>
</div>
@endsection
