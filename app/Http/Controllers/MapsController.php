<?php

namespace App\Http\Controllers;

use App\Models\Maps;
use App\Models\Bengkel;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;

class MapsController extends Controller
{
    public function index()
    {
        $mapsBackpages = Maps::paginate(5);
        return view('maps_backpage.index', compact('mapsBackpages'));
    }

    public function create()
    {
        $bengkel=Bengkel::all();
        return view('maps_backpage.create', compact('bengkel'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'id_bengkel' => 'required',
            'koordinatX' => 'required',
            'koordinatY' => 'required',
        ]);

        Maps::create($validatedData);

        return redirect()->route('maps_backpage.index')
            ->with('success', 'Data bengkel berhasil ditambahkan!');
    }

    public function show(Maps $mapsBackpage)
    {
        return view('maps_backpage.show', compact('mapsBackpage'));
    }

    public function edit(Maps $mapsBackpage)
    {
        return view('maps_backpage.edit', compact('mapsBackpage'));
    }

    public function update(Request $request, Maps $mapsBackpage)
    {
        $validatedData = $request->validate([
            'id_bengkel' => 'required',
            'koordinatX' => 'required',
            'koordinatY' => 'required',
        ]);

        $mapsBackpage->update($validatedData);

        return redirect()->route('maps_backpage.index')
            ->with('success', 'Data bengkel berhasil diperbarui!');
    }

    public function destroy(Maps $mapsBackpage)
    {
        $mapsBackpage->delete();

        return redirect()->route('maps_backpage.index')
            ->with('success', 'Data bengkel berhasil dihapus!');
    }
}