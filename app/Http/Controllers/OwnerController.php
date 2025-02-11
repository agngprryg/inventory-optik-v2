<?php

namespace App\Http\Controllers;

use App\Models\Owner;
use Illuminate\Http\Request;

class OwnerController extends Controller
{
    public function index()
    {
        $owners = Owner::all();
        return view('pages.role.owner.index', compact('owners'));
    }

    public function create()
    {
        return view('pages.role.owner.create');
    }

    public function store(Request $request)
    {
        // Owner::create($request->all());
        $logoPath = null;
        if ($request->hasFile('foto')) {
            $logoPath = $request->file('foto')->store('logos', 'public');
        }

        Owner::create([
            'nama_owner' => $request->nama_owner,
            'foto' => $logoPath,
            'alamat' => $request->alamat,
            'email' => $request->email,
            'no_telepon' => $request->no_telepon,
        ]);
        return redirect()->route('owner.index')->with('success', 'data berhasil ditambahkan');
    }

    public function show($id)
    {
        $owner = Owner::findOrFail($id);
        return view('pages.role.owner.edit', compact('owner'));
    }

    public function update(Request $request, $id)
    {
        $owner = Owner::findOrFail($id);
        $owner->update($request->all());

        return redirect()->route('owner.index')->with('success', 'data berhasil di update');
    }

    public function destroy($id)
    {
        $owner = Owner::findOrFail($id);
        $owner->delete();
        return redirect()->route('owner.index')->with('success', 'data berhasil di hapus');
    }
}
