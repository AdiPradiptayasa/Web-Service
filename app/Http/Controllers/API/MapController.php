<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Map;
use Illuminate\Support\Facades\Validator;

class MapController extends Controller
{
    public function index()
    {
        $map = Map::all();
        return response()->json(['map' => $map], 200);
    }

    public function show(Map $map)
    {
        return response()->json(['map' => $map], 200);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'id_bengkel' => 'required',
            'koordinatX' => 'required',
            'koordinatY' => 'required',
        ]);

        $map = Map::create($validatedData);

        return response()->json(['message' => 'Data bengkel berhasil ditambahkan!', 'Map' => $map], 200);
    }

    public function update(Request $request, Map $map)
    {
        $validatedData = $request->validate([
            'id_bengkel' => 'sometimes',
            'koordinatX' => 'sometimes',
            'koordinatY' => 'sometimes',
        ]);

        $map->update($validatedData);

        return response()->json(['message' => 'Data bengkel berhasil diperbarui!', 'Map' => $map], 200);
    }

    public function destroy(Map $map)
    {
        $map->delete();

        return response()->json(['message' => 'Data bengkel berhasil dihapus!'], 200);
    }
}
