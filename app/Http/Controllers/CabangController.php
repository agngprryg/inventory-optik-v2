<?php

namespace App\Http\Controllers;

use App\Models\Cabang;
use App\Models\Manager;
use Illuminate\Http\Request;

class CabangController extends Controller
{
    public function index()
    {
        $cabangs = Cabang::all();
        return view('pages.role.cabang.index', compact('cabangs'));
    }

    public function create()
    {
        $managers = Manager::all();
        return view('pages.role.cabang.create', compact('managers'));
    }

    public function store(Request $request)
    {
        Cabang::create($request->all());
        return redirect()->route('cabang.index')->with('success', 'data berhasil ditambahkan');
    }

    public function show($id)
    {
        $cabang = Cabang::findOrFail($id);
        $managers = Manager::all();
        return view('pages.role.cabang.edit', compact('cabang', 'managers'));
    }

    public function update(Request $request, $id)
    {
        $cabang = Cabang::findOrFail($id);
        $cabang->update($request->all());

        return redirect()->route('cabang.index')->with('success', 'data berhasil diupdate');
    }

    public function destroy($id)
    {
        $cabang = Cabang::findOrFail($id);
        $cabang->delete();

        return redirect()->route('cabang.index')->with('success', 'data berhasil dihapus');
    }
}
