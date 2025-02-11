<?php

namespace App\Http\Controllers;

use App\Models\Gudang;
use App\Models\Manager;
use Illuminate\Http\Request;

class GudangController extends Controller
{
    public function index()
    {
        $gudangs = Gudang::all();
        return view('pages.role.gudang.index', compact('gudangs'));
    }

    public function create()
    {
        $managers = Manager::all();

        return view('pages.role.gudang.create', compact('managers'));
    }

    public function store(Request $request)
    {
        Gudang::create($request->all());

        return redirect()->route('gudang.index')->with('success', 'data berhasil ditambahkan');
    }

    public function show($id)
    {
        $gudang = Gudang::findOrFail($id);
        $managers = Manager::all();

        return view('pages.role.gudang.edit', compact('gudang', 'managers'));
    }

    public function update(Request $request, $id)
    {
        $gudang = Gudang::findOrFail($id);

        $gudang->update($request->all());

        return redirect()->route('gudang.index')->with('success', 'data berhasil diupdate');
    }

    public function destroy($id)
    {
        $manager = Manager::findOrFail($id);

        $manager->delete();

        return redirect()->route('gudang.index')->with('success', 'data berhasil dihapus');
    }
}
