<?php

namespace App\Http\Controllers;

use App\Models\Distributor;
use Illuminate\Http\Request;

class DistributorController extends Controller
{
    public function index()
    {
        $distributors = Distributor::all();

        return view('pages.produk.distributor.index', compact('distributors'));
    }

    public function create()
    {

        return view('pages.produk.distributor.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_distributor' => 'required|string|max:255',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'alamat' => 'required|string',
            'email' => 'required|email|unique:distributor,email',
            'no_telepon' => 'required|string|max:20',
        ]);

        $logoPath = null;
        if ($request->hasFile('logo')) {
            $logoPath = $request->file('logo')->store('logos', 'public');
        }

        Distributor::create([
            'nama_distributor' => $request->nama_distributor,
            'logo' => $logoPath,
            'alamat' => $request->alamat,
            'email' => $request->email,
            'no_telepon' => $request->no_telepon,
        ]);

        return redirect()->route('distributor.index')->with('success', 'Data berhasil ditambahkan!');
    }

    public function show(Distributor $distributor)
    {
        return view('pages.produk.distributor.edit', compact('distributor'));
    }

    public function update(Request $request, Distributor $distributor)
    {
        $request->validate([
            'nama_distributor' => 'required|string|max:255',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'alamat' => 'required|string',
            'email' => 'required|email|unique:distributor,email,' . $distributor->id,
            'no_telepon' => 'required|string|max:20',
        ]);

        if ($request->hasFile('logo')) {
            $logoPath = $request->file('logo')->store('logos', 'public');
        } else {
            $logoPath = $distributor->logo;
        }

        $data =  $distributor->update([
            'nama_distributor' => $request->nama_distributor,
            'logo' => $logoPath,
            'alamat' => $request->alamat,
            'email' => $request->email,
            'no_telepon' => $request->no_telepon,
        ]);

        return response()->json($data);
        return redirect()->route('distributor.index')->with('success', 'Data berhasil diperbarui!');
    }

    public function destroy(Distributor $distributor)
    {
        $distributor->delete();
        return redirect()->route('distributor.index')->with('success', 'Data Berhasil Dihapus!');
    }
}
