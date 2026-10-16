<?php

namespace App\Http\Controllers;

use App\Models\Pelanggan;
use App\Models\Pesanan;
use Illuminate\Http\Request;

class PesananController extends Controller
{
    private function rules(): array
    {
        return [
            'pelanggan_id'    => 'required|exists:pelanggan,pelanggan_id',
            'jenis_pakaian'   => 'required|max:100',
            'jumlah'          => 'required|integer|min:1',
            'harga'           => 'required|numeric|min:0',
            'tanggal_pesan'   => 'required|date',
            'tanggal_selesai' => 'nullable|date|after_or_equal:tanggal_pesan',
            'status'          => 'required|in:Baru,Diproses,Selesai,Diambil',
            'catatan'         => 'nullable|max:255',
        ];
    }

    public function index()
    {
        $data['dataPesanan'] = Pesanan::with('pelanggan')->get();
        return view('admin.pesanan.index', $data);
    }

    public function create()
    {
        $data['dataPelanggan'] = Pelanggan::all();
        return view('admin.pesanan.create', $data);
    }

    public function store(Request $request)
    {
        $validated = $request->validate($this->rules());

        Pesanan::create($validated);

        return redirect()->route('pesanan.index')->with('success', 'Penambahan Data Berhasil!');
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        $data['dataPesanan']   = Pesanan::findOrFail($id);
        $data['dataPelanggan'] = Pelanggan::all();
        return view('admin.pesanan.edit', $data);
    }

    public function update(Request $request, string $id)
    {
        $pesanan   = Pesanan::findOrFail($id);
        $validated = $request->validate($this->rules());

        $pesanan->update($validated);

        return redirect()->route('pesanan.index')->with('success', 'Perubahan Data Berhasil!');
    }

    public function destroy(string $id)
    {
        Pesanan::findOrFail($id)->delete();

        return redirect()->route('pesanan.index')->with('success', 'Data berhasil dihapus');
    }
}
