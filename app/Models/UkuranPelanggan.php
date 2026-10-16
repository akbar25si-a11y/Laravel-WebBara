<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UkuranPelanggan extends Model
{
    protected $table = 'ukuran_pelanggan';
    protected $primaryKey = 'ukuran_id';

    protected $fillable = [
        'pelanggan_id', 'lingkar_dada', 'lingkar_pinggang', 'lingkar_pinggul',
        'panjang_baju', 'panjang_lengan', 'lebar_bahu', 'panjang_celana', 'catatan',
    ];

    public function pelanggan()
    {
        return $this->belongsTo(Pelanggan::class, 'pelanggan_id', 'pelanggan_id');
    }
}
