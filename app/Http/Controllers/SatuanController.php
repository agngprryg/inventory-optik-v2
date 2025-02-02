<?php

namespace App\Http\Controllers;

use App\Models\Satuan;
use Illuminate\Http\Request;

class SatuanController extends Controller
{
    public function index()
    {
        return Satuan::all();
    }

    public function store(Request $request)
    {
        return Satuan::create($request->all());
    }

    public function show(Satuan $satuan)
    {
        return $satuan;
    }

    public function update(Request $request, Satuan $satuan)
    {
        $satuan->update($request->all());
        return $satuan;
    }

    public function destroy(Satuan $satuan)
    {
        $satuan->delete();
        return response()->json(['message' => 'Deleted successfully']);
    }
}
