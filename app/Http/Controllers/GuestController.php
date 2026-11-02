<?php

namespace App\Http\Controllers;

use App\Models\Layanan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GuestController extends Controller
{
    public function index(Request $request)
    {
        // ELOQUENT: daftar layanan + kategorinya, dengan filter & pencarian
        $data['dataLayanan'] = Layanan::with('kategori')
            // where biasa lewat relasi: filter berdasarkan slug kategori
            ->when($request->kategori, function ($query, $slug) {
                $query->whereHas('kategori', function ($q) use ($slug) {
                    $q->where('slug', $slug);
                });
            })
            // NESTED WHERE: (nama LIKE ... OR deskripsi LIKE ...) dikelompokkan dalam kurung
            ->when($request->q, function ($query, $keyword) {
                $query->where(function ($w) use ($keyword) {
                    $w->where('nama', 'like', "%{$keyword}%")
                      ->orWhere('deskripsi', 'like', "%{$keyword}%");
                });
            })
            ->orderBy('nama')
            ->get();

        // QUERY BUILDER: daftar kategori + jumlah layanan (leftJoin)
        $data['dataKategori'] = DB::table('kategori_layanan')
            ->leftJoin('layanan', 'layanan.kategori_id', '=', 'kategori_layanan.kategori_id')
            ->select('kategori_layanan.kategori_id', 'kategori_layanan.nama', 'kategori_layanan.slug',
                     DB::raw('COUNT(layanan.layanan_id) as total_layanan'))
            ->groupBy('kategori_layanan.kategori_id', 'kategori_layanan.nama', 'kategori_layanan.slug')
            ->orderBy('kategori_layanan.nama')
            ->get();

        return view('guest.DashboardGuest', $data);
    }
}
