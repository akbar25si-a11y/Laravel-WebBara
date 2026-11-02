<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

/**
 * CRUD 2 - memakai QUERY BUILDER (DB::table), tanpa Model.
 */
class KategoriLayananController extends Controller
{
    // READ: leftJoin supaya kategori yang belum punya layanan tetap tampil (total = 0)
    public function index()
    {
        $data['dataKategori'] = DB::table('kategori_layanan')
            ->leftJoin('layanan', 'layanan.kategori_id', '=', 'kategori_layanan.kategori_id')
            ->select(
                'kategori_layanan.*',
                DB::raw('COUNT(layanan.layanan_id) as total_layanan')
            )
            ->groupBy(
                'kategori_layanan.kategori_id',
                'kategori_layanan.nama',
                'kategori_layanan.slug',
                'kategori_layanan.deskripsi',
                'kategori_layanan.created_at',
                'kategori_layanan.updated_at'
            )
            ->orderBy('kategori_layanan.nama')
            ->get();

        return view('admin.kategori.index', $data);
    }

    public function create()
    {
        return view('admin.kategori.create');
    }

    // CREATE: insert() tidak mengisi created_at/updated_at otomatis, jadi diisi manual
    public function store(Request $request)
    {
        $request->validate([
            'nama'      => 'required|max:100',
            'deskripsi' => 'nullable|max:255',
        ]);

        $slug = Str::slug($request->nama);

        // Cek slug unik (nested where tidak perlu, cukup where biasa)
        if (DB::table('kategori_layanan')->where('slug', $slug)->exists()) {
            return back()->withInput()->withErrors(['nama' => 'Nama kategori sudah dipakai.']);
        }

        DB::table('kategori_layanan')->insert([
            'nama'       => $request->nama,
            'slug'       => $slug,
            'deskripsi'  => $request->deskripsi,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect()->route('kategori.index')->with('success', 'Penambahan Data Berhasil!');
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        $kategori = DB::table('kategori_layanan')->where('kategori_id', $id)->first();
        abort_if(! $kategori, 404);

        $data['dataKategori'] = $kategori;
        return view('admin.kategori.edit', $data);
    }

    // UPDATE
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama'      => 'required|max:100',
            'deskripsi' => 'nullable|max:255',
        ]);

        $slug = Str::slug($request->nama);

        // slug harus unik, kecuali milik kategori yang sedang diedit
        $dipakai = DB::table('kategori_layanan')
            ->where('slug', $slug)
            ->where('kategori_id', '!=', $id)
            ->exists();

        if ($dipakai) {
            return back()->withInput()->withErrors(['nama' => 'Nama kategori sudah dipakai.']);
        }

        DB::table('kategori_layanan')
            ->where('kategori_id', $id)
            ->update([
                'nama'       => $request->nama,
                'slug'       => $slug,
                'deskripsi'  => $request->deskripsi,
                'updated_at' => now(),
            ]);

        return redirect()->route('kategori.index')->with('success', 'Perubahan Data Berhasil!');
    }

    // DELETE: layanan di kategori ini otomatis kategori_id = NULL (onDelete set null)
    public function destroy(string $id)
    {
        DB::table('kategori_layanan')->where('kategori_id', $id)->delete();

        return redirect()->route('kategori.index')->with('success', 'Data berhasil dihapus');
    }
}
