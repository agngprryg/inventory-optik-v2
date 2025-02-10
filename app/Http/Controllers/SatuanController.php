<?php

namespace App\Http\Controllers;

use App\Models\Satuan;
use Illuminate\Http\Request;

class SatuanController extends Controller
{
    public function index()
    {
        $satuans =  Satuan::all();
        return view('pages.produk.satuan.index', compact('satuans'));
    }

    public function store(Request $request)
    {
        Satuan::create($request->all());

        return redirect()->route('satuan.index')->with('success', 'data berhasil di tambahkan');
    }

    public function show($id)
    {
        $satuan = Satuan::findOrFail($id);
        return view('pages.produk.satuan.edit', compact('satuan'));
    }

    public function update(Request $request, Satuan $satuan)
    {
        $satuan->update($request->all());
        return redirect()->route('satuan.index')->with('success', 'data berhasil di update');
    }

    public function destroy(Satuan $satuan)
    {
        $satuan->delete();
        return redirect()->route('satuan.index')->with('success', 'data berhasil di hapus');
    }
}
