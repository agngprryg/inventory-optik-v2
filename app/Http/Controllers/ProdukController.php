<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    public function index()
    {
        return Produk::with(['merek', 'kategori', 'satuan', 'distributor'])->get();
    }

    public function store(Request $request)
    {
        return Produk::create($request->all());
    }

    public function show(Produk $produk)
    {
        return $produk;
    }

    public function update(Request $request, Produk $produk)
    {
        $produk->update($request->all());
        return $produk;
    }

    public function destroy(Produk $produk)
    {
        $produk->delete();
        return response()->json(['message' => 'Deleted successfully']);
    }
}
