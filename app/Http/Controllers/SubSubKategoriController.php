<?php

namespace App\Http\Controllers;

use App\Models\SubSubKategori;
use Illuminate\Http\Request;

class SubSubKategoriController extends Controller
{
    public function index()
    {
        return SubSubKategori::all();
    }

    public function store(Request $request)
    {
        return SubSubKategori::create($request->all());
    }

    public function show(SubSubKategori $subSubKategori)
    {
        return $subSubKategori;
    }

    public function update(Request $request, SubSubKategori $subSubKategori)
    {
        $subSubKategori->update($request->all());
        return $subSubKategori;
    }

    public function destroy(SubSubKategori $subSubKategori)
    {
        $subSubKategori->delete();
        return response()->json(['message' => 'Deleted successfully']);
    }
}
