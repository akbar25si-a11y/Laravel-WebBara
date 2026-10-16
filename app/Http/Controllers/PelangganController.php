<?php

namespace App\Http\Controllers;

use App\Models\Pelanggan;
use Illuminate\Http\Request;

class PelangganController extends Controller
{
    public function index()
    {
        $data['dataPelanggan'] = Pelanggan::all();
        return view('admin.pelanggan.index', $data);
    }

    public function create()
    {
        return view('admin.pelanggan.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required|max:100',
            'last_name'  => 'required|max:100',
            'birthday'   => 'required|date',
            'gender'     => 'required|in:Male,Female',
            'email'      => 'required|email|unique:pelanggan,email',
            'phone'      => 'required|numeric',
        ]);

        $data['first_name'] = $request->first_name;
        $data['last_name']  = $request->last_name;
        $data['birthday']   = $request->birthday;
        $data['gender']     = $request->gender;
        $data['email']      = $request->email;
        $data['phone']      = $request->phone;

        Pelanggan::create($data);

        return redirect()->route('pelanggan.index')->with('success', 'Penambahan Data Berhasil!');
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        $data['dataPelanggan'] = Pelanggan::findOrFail($id);
        return view('admin.pelanggan.edit', $data);
    }

    public function update(Request $request, string $id)
    {
        $pelanggan = Pelanggan::findOrFail($id);

        $request->validate([
            'first_name' => 'required|max:100',
            'last_name'  => 'required|max:100',
            'birthday'   => 'required|date',
            'gender'     => 'required|in:Male,Female',
            'email'      => 'required|email|unique:pelanggan,email,' . $id . ',pelanggan_id',
            'phone'      => 'required|numeric',
        ]);

        $pelanggan->first_name = $request->first_name;
        $pelanggan->last_name  = $request->last_name;
        $pelanggan->birthday   = $request->birthday;
        $pelanggan->gender     = $request->gender;
        $pelanggan->email      = $request->email;
        $pelanggan->phone      = $request->phone;
        $pelanggan->save();

        return redirect()->route('pelanggan.index')->with('success', 'Perubahan Data Berhasil!');
    }

    public function destroy(string $id)
    {
        Pelanggan::findOrFail($id)->delete();

        return redirect()->route('pelanggan.index')->with('success', 'Data berhasil dihapus');
    }
}
