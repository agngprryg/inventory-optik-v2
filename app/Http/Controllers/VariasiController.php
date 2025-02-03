<?php

namespace App\Http\Controllers;

use App\Models\Variasi;
use Illuminate\Http\Request;

class VariasiController extends Controller
{
    public function index()
    {
        $variasis = Variasi::all();

        return view('pages.produk.variasi.index', compact('variasis'));
    }

    public function create()
    {
        return view('pages.produk.variasi.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_variasi' => 'required|string',
            'tipe' => 'required|in:Pilihan,Isian',
            'opsi' => 'nullable|array',
        ]);

        $opsi = $request->tipe === 'Pilihan' ? json_encode($request->opsi) : null;

        Variasi::create([
            'id_kategori' => null,
            'nama_variasi' => $request->nama_variasi,
            'tipe' => $request->tipe,
            'opsi' => $opsi,
        ]);

        return redirect()->route('variasi.index')->with('success', 'Data Berhasil Ditambahkan!');
    }

    public function show($id)
    {
        $variasi = Variasi::findOrFail($id);

        $variasi->opsi = $variasi->opsi ? json_decode($variasi->opsi, true) : [];

        return view('pages.produk.variasi.edit', compact('variasi'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_variasi' => 'required|string|max:255',
            'tipe' => 'required|in:Pilihan,Isian',
            'opsi' => 'nullable|array', // opsi harus array jika ada
        ]);

        $variasi = Variasi::findOrFail($id);
        $variasi->update([
            'nama_variasi' => $request->nama_variasi,
            'tipe' => $request->tipe,
            'opsi' => $request->tipe === 'Pilihan' ? json_encode($request->opsi) : null, // Simpan sebagai JSON
        ]);

        return redirect()->route('variasi.index')->with('success', 'Data Berhasil Di Update!');
    }

    public function destroy($id)
    {
        $variasiProduk = Variasi::findOrFail($id);
        $variasiProduk->delete();

        return redirect()->route('variasi.index')->with('success', 'Data Berhasil Dihapus!');
    }
}
