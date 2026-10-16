<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pesanan extends Model
{
    protected $table = 'pesanan';
    protected $primaryKey = 'pesanan_id';

    protected $fillable = [
        'pelanggan_id', 'jenis_pakaian', 'jumlah', 'harga',
        'tanggal_pesan', 'tanggal_selesai', 'status', 'catatan',
    ];

    public function pelanggan()
    {
        return $this->belongsTo(Pelanggan::class, 'pelanggan_id', 'pelanggan_id');
    }
}
