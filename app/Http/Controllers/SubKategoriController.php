<?php

namespace App\Http\Controllers;

use App\Models\SubKategori;
use Illuminate\Http\Request;

class SubKategoriController extends Controller
{
    public function index()
    {
        return SubKategori::with('subSubKategori')->get();
    }

    public function store(Request $request)
    {
        return SubKategori::create($request->all());
    }

    public function show(SubKategori $subKategori)
    {
        return $subKategori;
    }

    public function update(Request $request, SubKategori $subKategori)
    {
        $subKategori->update($request->all());
        return $subKategori;
    }

    public function destroy(SubKategori $subKategori)
    {
        $subKategori->delete();
        return response()->json(['message' => 'Deleted successfully']);
    }
}
