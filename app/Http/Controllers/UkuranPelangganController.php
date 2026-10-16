<?php

namespace App\Http\Controllers;

use App\Models\Pelanggan;
use App\Models\UkuranPelanggan;
use Illuminate\Http\Request;

class UkuranPelangganController extends Controller
{
    private function rules(): array
    {
        return [
            'pelanggan_id'     => 'required|exists:pelanggan,pelanggan_id',
            'lingkar_dada'     => 'required|numeric|min:0',
            'lingkar_pinggang' => 'required|numeric|min:0',
            'lingkar_pinggul'  => 'required|numeric|min:0',
            'panjang_baju'     => 'required|numeric|min:0',
            'panjang_lengan'   => 'required|numeric|min:0',
            'lebar_bahu'       => 'required|numeric|min:0',
            'panjang_celana'   => 'required|numeric|min:0',
            'catatan'          => 'nullable|max:255',
        ];
    }

    public function index()
    {
        $data['dataUkuran'] = UkuranPelanggan::with('pelanggan')->get();
        return view('admin.ukuran.index', $data);
    }

    public function create()
    {
        $data['dataPelanggan'] = Pelanggan::all();
        return view('admin.ukuran.create', $data);
    }

    public function store(Request $request)
    {
        $validated = $request->validate($this->rules());

        UkuranPelanggan::create($validated);

        return redirect()->route('ukuran.index')->with('success', 'Penambahan Data Berhasil!');
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        $data['dataUkuran']    = UkuranPelanggan::findOrFail($id);
        $data['dataPelanggan'] = Pelanggan::all();
        return view('admin.ukuran.edit', $data);
    }

    public function update(Request $request, string $id)
    {
        $ukuran    = UkuranPelanggan::findOrFail($id);
        $validated = $request->validate($this->rules());

        $ukuran->update($validated);

        return redirect()->route('ukuran.index')->with('success', 'Perubahan Data Berhasil!');
    }

    public function destroy(string $id)
    {
        UkuranPelanggan::findOrFail($id)->delete();

        return redirect()->route('ukuran.index')->with('success', 'Data berhasil dihapus');
    }
}
