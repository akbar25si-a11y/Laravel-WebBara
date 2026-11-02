{{-- Partial view: kartu satu layanan. Dipanggil dengan @include('guest.partials.layanan-card', ['item' => $layanan]) --}}
<div class="col-md-4 mb-4">
   <div class="card h-100 shadow-sm">
      <div class="card-body d-flex flex-column">
         <span class="badge badge-secondary align-self-start mb-2">{{ $item->kategori->nama ?? 'Umum' }}</span>
         <h5 class="card-title">{{ $item->nama }}</h5>
         <p class="card-text text-muted">{{ \Illuminate\Support\Str::limit($item->deskripsi, 90) }}</p>
         <div class="mt-auto">
            <strong>Mulai Rp {{ number_format($item->harga_mulai, 0, ',', '.') }}</strong><br>
            <small class="text-muted">Estimasi {{ $item->estimasi_hari }} hari</small>
         </div>
      </div>
   </div>
</div>
