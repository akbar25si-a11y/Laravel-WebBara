@extends('admin.layouts.app')
@section('title', 'Data User')
@section('icon', 'bi-person-gear')
@section('heading', 'Data User')
@section('subheading', 'List data seluruh user')
@section('actions')
  <a href="{{ route('user.create') }}" class="btn btn-success btn-sm text-white"><i class="bi bi-plus-lg"></i> Tambah User</a>
@endsection

@section('content')
<div class="table-responsive">
  <table id="table-user" class="table align-middle mb-0">
    <thead>
      <tr>
        <th>Name</th><th>Email</th><th class="text-end">Action</th>
      </tr>
    </thead>
    <tbody>
      @forelse ($dataUser as $item)
        <tr>
          <td>{{ $item->name }}</td>
          <td>{{ $item->email }}</td>
          <td class="text-end">
            <a href="{{ route('user.edit', $item->id) }}" class="btn btn-info btn-sm"><i class="bi bi-pencil"></i> Edit</a>
            <form action="{{ route('user.destroy', $item->id) }}" method="POST" style="display:inline" onsubmit="return confirm('Hapus data ini?')">
              @csrf
              @method('DELETE')
              <button type="submit" class="btn btn-danger btn-sm"><i class="bi bi-trash"></i> Hapus</button>
            </form>
          </td>
        </tr>
      @empty
        <tr><td colspan="3" class="text-center text-muted">Belum ada data user.</td></tr>
      @endforelse
    </tbody>
  </table>
</div>
@endsection
