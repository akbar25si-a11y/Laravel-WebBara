<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Model ini HANYA dipakai agar relasi belongsTo() di Layanan punya tujuan.
 * CRUD kategori sendiri memakai Query Builder (DB::table), bukan model ini.
 */
class KategoriLayanan extends Model
{
    protected $table = 'kategori_layanan';
    protected $primaryKey = 'kategori_id';

    protected $fillable = ['nama', 'slug', 'deskripsi'];

    public function layanan()
    {
        return $this->hasMany(Layanan::class, 'kategori_id', 'kategori_id');
    }
}
