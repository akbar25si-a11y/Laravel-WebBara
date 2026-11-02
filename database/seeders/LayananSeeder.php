<?php

namespace Database\Seeders;

use App\Models\Layanan;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LayananSeeder extends Seeder
{
    public function run(): void
    {
        $kategori = [
            ['nama' => 'Kebaya & Pakaian Adat', 'slug' => 'kebaya-pakaian-adat', 'deskripsi' => 'Jahit kebaya, batik, dan pakaian adat'],
            ['nama' => 'Seragam',               'slug' => 'seragam',             'deskripsi' => 'Seragam sekolah, kantor, dan komunitas'],
            ['nama' => 'Permak',                'slug' => 'permak',              'deskripsi' => 'Perbaikan dan penyesuaian ukuran pakaian'],
        ];

        foreach ($kategori as $k) {
            DB::table('kategori_layanan')->updateOrInsert(
                ['slug' => $k['slug']],
                $k + ['created_at' => now(), 'updated_at' => now()]
            );
        }

        $id = fn ($slug) => DB::table('kategori_layanan')->where('slug', $slug)->value('kategori_id');

        $layanan = [
            ['kategori_id' => $id('kebaya-pakaian-adat'), 'nama' => 'Kebaya Modern',   'deskripsi' => 'Kebaya custom sesuai ukuran badan.',   'harga_mulai' => 350000, 'estimasi_hari' => 14],
            ['kategori_id' => $id('seragam'),             'nama' => 'Seragam Kantor',  'deskripsi' => 'Pemesanan seragam kantor satuan/partai.', 'harga_mulai' => 150000, 'estimasi_hari' => 10],
            ['kategori_id' => $id('permak'),              'nama' => 'Permak Celana',   'deskripsi' => 'Potong, kecilkan, atau besarkan celana.', 'harga_mulai' => 25000,  'estimasi_hari' => 2],
        ];

        foreach ($layanan as $l) {
            Layanan::firstOrCreate(['nama' => $l['nama']], $l);
        }
    }
}
