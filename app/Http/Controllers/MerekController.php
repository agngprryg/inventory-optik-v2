<?php

namespace App\Http\Controllers;

use App\Models\Merek;
use Illuminate\Http\Request;

class MerekController extends Controller
{
    public function index()
    {
        $mereks = Merek::all();

        return view('pages.produk.merek.index', compact('mereks'));
    }

    public function store(Request $request)
    {
        Merek::create($request->all());

        return redirect()->route('merek.index')->with('success', 'data berhasil ditambahkan');
    }

    public function show($id)
    {
        $merek = Merek::findOrFail($id);

        return view('pages.produk.merek.edit', compact('merek'));
    }

    public function update(Request $request,  $id)
    {
        $merek = Merek::findOrFail($id);

        $merek->update($request->all());

        return redirect()->route('merek.index')->with('success', 'data berhasil di update');
    }

    public function destroy(Merek $merek)
    {
        $merek->delete();
        return redirect()->route('merek.index')->with('success', 'data berhasil di hapus');
    }
}
