<?php

namespace App\Http\Controllers;

use App\Models\Manager;
use App\Models\Merek;
use Illuminate\Http\Request;

class ManagerController extends Controller
{
    public function index()
    {
        $managers = Manager::all();
        return view('pages.role.manager.index', compact('managers'));
    }

    public function create()
    {
        return view('pages.role.manager.create');
    }

    public function store(Request $request)
    {
        $logoPath = null;
        if ($request->hasFile('foto')) {
            $logoPath = $request->file('foto')->store('logos', 'public');
        }

        Manager::create([
            'nama_manager' => $request->nama_manager,
            'foto' => $logoPath,
            'alamat' => $request->alamat,
            'email' => $request->email,
            'no_telepon' => $request->no_telepon,
        ]);

        return redirect()->route('manager.index')->with('success', 'akun berhasil ditambahkan');
    }

    public function show($id)
    {

        $manager = Manager::findOrFail($id);

        return view('pages.role.manager.edit', compact('manager'));
    }

    public function update(Request $request, $id)
    {
        $manager = Manager::findOrFail($id);

        $logoPath = null;
        if ($request->hasFile('foto')) {
            $logoPath = $request->file('foto')->store('logos', 'public');
        }
        $manager->update([
            'nama_manager' => $request->nama_manager,
            'foto' => $logoPath,
            'alamat' => $request->alamat,
            'email' => $request->email,
            'no_telepon' => $request->no_telepon,
        ]);

        return redirect()->route('manager.index')->with('success', 'akun berhasil diupdate');
    }

    public function destroy($id)
    {
        $manager = Manager::findOrFail($id);

        $manager->delete();

        return redirect()->route('manager.index')->with('success', 'akun berhasil dihapus');
    }
}
