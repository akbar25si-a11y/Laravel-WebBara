@extends('admin.layouts.app')
@section('title', 'Data Pelanggan')
@section('icon', 'bi-people')
@section('heading', 'Data Pelanggan')
@section('subheading', 'List data seluruh pelanggan')
@section('actions')
  <a href="{{ route('pelanggan.create') }}" class="btn btn-success btn-sm text-white"><i class="bi bi-plus-lg"></i> Tambah Pelanggan</a>
@endsection

@section('content')
<div class="table-responsive">
  <table id="table-pelanggan" class="table align-middle mb-0">
    <thead>
      <tr>
        <th>First Name</th><th>Last Name</th><th>Birthday</th><th>Gender</th>
        <th>Email</th><th>Phone</th><th class="text-end">Action</th>
      </tr>
    </thead>
    <tbody>
      @forelse ($dataPelanggan as $item)
        <tr>
          <td>{{ $item->first_name }}</td>
          <td>{{ $item->last_name }}</td>
          <td>{{ $item->birthday }}</td>
          <td>{{ $item->gender }}</td>
          <td>{{ $item->email }}</td>
          <td>{{ $item->phone }}</td>
          <td class="text-end">
            <a href="{{ route('pelanggan.edit', $item->pelanggan_id) }}" class="btn btn-info btn-sm"><i class="bi bi-pencil"></i> Edit</a>
            <form action="{{ route('pelanggan.destroy', $item->pelanggan_id) }}" method="POST" style="display:inline" onsubmit="return confirm('Hapus data ini?')">
              @csrf
              @method('DELETE')
              <button type="submit" class="btn btn-danger btn-sm"><i class="bi bi-trash"></i> Hapus</button>
            </form>
          </td>
        </tr>
      @empty
        <tr><td colspan="7" class="text-center text-muted">Belum ada data pelanggan.</td></tr>
      @endforelse
    </tbody>
  </table>
</div>
@endsection
