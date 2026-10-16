<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pelanggan extends Model
{
    protected $table = 'pelanggan';
    protected $primaryKey = 'pelanggan_id';

    protected $fillable = [
        'first_name', 'last_name', 'birthday', 'gender', 'email', 'phone',
    ];

    public function ukuran()
    {
        return $this->hasMany(UkuranPelanggan::class, 'pelanggan_id', 'pelanggan_id');
    }

    public function pesanan()
    {
        return $this->hasMany(Pesanan::class, 'pelanggan_id', 'pelanggan_id');
    }
}
