<?php

namespace App\Http\Controllers;

use App\Models\Distributor;
use App\Models\Kategori;
use App\Models\Merek;
use App\Models\Produk;
use App\Models\Satuan;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    public function index()
    {
        $produks = Produk::with(['merek', 'kategori.variasi', 'satuan', 'distributor'])->get();
        // return response()->json($produks);
        return view('pages.produk.list-produk.index', compact('produks'));

        return Produk::with(['merek', 'kategori.variasi', 'satuan', 'distributor'])->get();
    }

    public function create()
    {

        $mereks = Merek::all();
        $kategoris = Kategori::all();
        $satuans = Satuan::all();
        $distributors = Distributor::all();

        return view('pages.produk.list-produk.create', compact('mereks', 'kategoris', 'satuans', 'distributors'));
    }

    public function store(Request $request)
    {
        Produk::create($request->all());
        return redirect()->route('list-produk.index')->with('success', 'data berhasil ditambahkan');
    }

    public function show($id)
    {

        $produk = Produk::findOrFail($id);
        // return response()->json($produk);
        $mereks = Merek::all();
        $kategoris = Kategori::all();
        $satuans = Satuan::all();
        $distributors = Distributor::all();

        return view('pages.produk.list-produk.edit', compact('produk', 'mereks', 'kategoris', 'satuans', 'distributors'));
    }

    public function update(Request $request, $id)
    {
        // $updated = $produk->update($request->all());

        // $request->validate([
        //     'nama_produk' => 'required|string|max:255',
        //     'id_merek' => 'required|exists:merek,id',
        //     'id_kategori' => 'required|exists:kategori,id',
        //     'id_satuan' => 'required|exists:satuan,id',
        //     'id_distributor' => 'nullable|exists:distributor,id',
        //     'catatan' => 'nullable|string',
        //     'harga' => 'required|numeric|min:0',
        //     'stok' => 'required|integer|min:0',
        // ]);

        // dd(request()->all());

        // $produk->nama_produk = $request->nama_produk;
        // $updated = $produk->save();

        // return response()->json(['success' => $updated]);


        // $produk->nama_produk = $request->nama_produk;
        // $produk->id_merek = $request->id_merek;
        // $produk->id_kategori = $request->id_kategori;
        // $produk->id_satuan = $request->id_satuan;
        // $produk->id_distributor = $request->id_distributor;
        // $produk->catatan = $request->catatan;
        // $produk->harga = str_replace('.', '', $request->harga);
        // $produk->stok = $request->stok;

        // $produk->save();

        $produk = Produk::findOrFail($id);

        $produk->update([
            'nama_produk' => $request->nama_produk,
            'id_merek' => $request->id_merek,
            'id_kategori' => $request->id_kategori,
            'id_satuan' => $request->id_satuan,
            'id_distributor' => $request->id_distributor,
            'catatan' => $request->catatan,
            'harga' => str_replace('.', '', $request->harga), // Menghapus titik pemisah ribuan
            'stok' => $request->stok,
        ]);

        return redirect()->route('list-produk.index')->with('success', 'data berhasil di update');
    }

    public function destroy($id)
    {

        $produk = Produk::findOrFail($id);

        $produk->delete();
        return redirect()->route('list-produk.index')->with('success', 'data berhasil di hapus');
    }
}
