@extends('layouts.admin.app')
@section('title', 'Data Pesanan')
@section('icon', 'bi-bag-check')
@section('heading', 'Data Pesanan')
@section('subheading', 'List seluruh pesanan jahitan')
@section('actions')
  <a href="{{ route('pesanan.create') }}" class="btn btn-success btn-sm text-white"><i class="bi bi-plus-lg"></i> Tambah Pesanan</a>
@endsection

@section('content')
<div class="table-responsive">
  <table id="table-pesanan" class="table align-middle mb-0">
    <thead>
      <tr><th>Pelanggan</th><th>Jenis Pakaian</th><th>Jumlah</th><th>Harga</th><th>Tgl Pesan</th><th>Tgl Selesai</th><th>Status</th><th>Catatan</th><th class="text-end">Action</th></tr>
    </thead>
    <tbody>
      @forelse ($dataPesanan as $item)
        <tr>
          <td>{{ $item->pelanggan->first_name ?? '-' }} {{ $item->pelanggan->last_name ?? '' }}</td>
          <td>{{ $item->jenis_pakaian }}</td>
          <td>{{ $item->jumlah }}</td>
          <td>Rp {{ number_format($item->harga, 0, ',', '.') }}</td>
          <td>{{ $item->tanggal_pesan }}</td>
          <td>{{ $item->tanggal_selesai }}</td>
          <td><span class="badge text-bg-secondary">{{ $item->status }}</span></td>
          <td>{{ $item->catatan }}</td>
          <td class="text-end">
            <a href="{{ route('pesanan.edit', $item->pesanan_id) }}" class="btn btn-info btn-sm"><i class="bi bi-pencil"></i> Edit</a>
            <form action="{{ route('pesanan.destroy', $item->pesanan_id) }}" method="POST" style="display:inline" onsubmit="return confirm('Hapus data ini?')">
              @csrf
              @method('DELETE')
              <button type="submit" class="btn btn-danger btn-sm"><i class="bi bi-trash"></i> Hapus</button>
            </form>
          </td>
        </tr>
      @empty
        <tr><td colspan="9" class="text-center text-muted">Belum ada data.</td></tr>
      @endforelse
    </tbody>
  </table>
</div>
@endsection
