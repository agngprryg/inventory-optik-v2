<?php

namespace App\Http\Controllers;

use App\Models\Distributor;
use Illuminate\Http\Request;

class DistributorController extends Controller
{
    public function index()
    {
        return Distributor::all();
    }

    public function store(Request $request)
    {
        return Distributor::create($request->all());
    }

    public function show(Distributor $distributor)
    {
        return $distributor;
    }

    public function update(Request $request, Distributor $distributor)
    {
        $distributor->update($request->all());
        return $distributor;
    }

    public function destroy(Distributor $distributor)
    {
        $distributor->delete();
        return response()->json(['message' => 'Deleted successfully']);
    }
}
