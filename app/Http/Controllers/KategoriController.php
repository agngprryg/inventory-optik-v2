<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Variasi;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    public function index()
    {
        $kategoris = Kategori::with('variasis')->get();

        return view('pages.produk.kategori.index', compact('kategoris'));
    }

    public function create()
    {
        $variasi = Variasi::all();

        return view('pages.produk.kategori.create', compact('variasi'));
    }


    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_kategori' => 'required|string|max:255',
            'variasi_ids' => 'array', // harus berupa array
            'variasi_ids.*' => 'integer|exists:variasi,id' // setiap item harus ID variasi yang valid
        ]);

        $kategori = Kategori::create([
            'nama_kategori' => $validated['nama_kategori']
        ]);

        if (!empty($validated['variasi_ids'])) {
            $kategori->variasis()->attach($validated['variasi_ids']);
        }

        return redirect()->route('kategori.index')->with('success', 'Kategori berhasil Di tambahkan');
    }


    public function show($id)
    {
        $kategori = Kategori::findOrFail($id);
        $variasi = Variasi::all();
        return view('pages.produk.kategori.edit', compact('kategori', 'variasi'));
    }

    public function update(Request $request, Kategori $kategori)
    {
        $validated = $request->validate([
            'nama_kategori' => 'required|string|max:255',
            'variasi_ids' => 'array', // harus berupa array
            'variasi_ids.*' => 'integer|exists:variasi,id' // setiap item harus ID variasi yang valid
        ]);


        $kategori->update([
            'nama_kategori' => $validated['nama_kategori']
        ]);

        if ($request->has('variasi_ids')) {
            $kategori->variasis()->sync($validated['variasi_ids']); // Lebih praktis dari `detach()` + `attach()`
        } else {
            $kategori->variasis()->detach(); // Hanya hapus relasi jika tidak ada variasi baru
        }

        return redirect()->route('kategori.index')->with('success', 'Kategori berhasil Di Update');
    }

    public function destroy(Kategori $kategori)
    {

        $kategori->variasis()->detach();

        $kategori->delete();

        return redirect()->route('kategori.index')->with('success', 'Kategori berhasil Dihapus');
    }
}
