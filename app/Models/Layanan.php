<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Layanan extends Model
{
    protected $table = 'layanan';
    protected $primaryKey = 'layanan_id';

    protected $fillable = [
        'kategori_id', 'nama', 'deskripsi', 'harga_mulai', 'estimasi_hari',
    ];

    // Relasi: satu layanan milik satu kategori
    public function kategori()
    {
        return $this->belongsTo(KategoriLayanan::class, 'kategori_id', 'kategori_id');
    }
}
