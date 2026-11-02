<?php

namespace App\Http\Controllers;

use App\Models\Layanan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

/**
 * CRUD 1 - memakai ELOQUENT ORM (lewat Model Layanan).
 */
class LayananController extends Controller
{
    private function rules(): array
    {
        return [
            'kategori_id'   => 'required|exists:kategori_layanan,kategori_id',
            'nama'          => 'required|max:150',
            'deskripsi'     => 'nullable|max:1000',
            'harga_mulai'   => 'required|numeric|min:0',
            'estimasi_hari' => 'required|integer|min:1',
        ];
    }

    // READ: with('kategori') = ambil relasi sekaligus (menghindari N+1 query)
    public function index()
    {
        $data['dataLayanan'] = Layanan::with('kategori')->latest()->get();
        return view('admin.layanan.index', $data);
    }

    public function create()
    {
        // Dropdown kategori diambil lewat Query Builder (karena CRUD kategori = Query Builder)
        $data['dataKategori'] = DB::table('kategori_layanan')->orderBy('nama')->get();
        return view('admin.layanan.create', $data);
    }

    // CREATE
    public function store(Request $request)
    {
        $validated = $request->validate($this->rules());

        Layanan::create($validated);

        return redirect()->route('layanan.index')->with('success', 'Penambahan Data Berhasil!');
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        $data['dataLayanan']  = Layanan::findOrFail($id);
        $data['dataKategori'] = DB::table('kategori_layanan')->orderBy('nama')->get();
        return view('admin.layanan.edit', $data);
    }

    // UPDATE
    public function update(Request $request, string $id)
    {
        $layanan   = Layanan::findOrFail($id);
        $validated = $request->validate($this->rules());

        $layanan->update($validated);

        return redirect()->route('layanan.index')->with('success', 'Perubahan Data Berhasil!');
    }

    // DELETE
    public function destroy(string $id)
    {
        Layanan::findOrFail($id)->delete();

        return redirect()->route('layanan.index')->with('success', 'Data berhasil dihapus');
    }
}
