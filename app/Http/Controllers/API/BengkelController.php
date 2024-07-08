<?php

namespace App\Http\Controllers\API;

use App\Models\Bengkel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class BengkelController extends Controller
{
    public function index()
    {
        $bengkel = Bengkel::all();
        return response()->json(['bengkel' => $bengkel], 200);
    }

    public function show(Bengkel $bengkel)
    {
        return response()->json(['bengkel' => $bengkel], 200);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama_bengkel' => 'required',
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'deskripsi' => 'required',
            'kategori' => 'required',
            'lokasi' => 'required',
            'jam_buka' => 'required',
            'jam_tutup' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }

        if ($request->hasFile('foto')) {
            $imageName = time().'.'.$request->file('foto')->getClientOriginalExtension();
            $request->file('foto')->move(public_path('images'), $imageName);
        }

        $bengkel = new Bengkel([
            'nama_bengkel' => $request->nama_bengkel,
            'deskripsi' => $request->deskripsi,
            'kategori' => $request->kategori,
            'lokasi' => $request->lokasi,
            'jam_buka' => $request->jam_buka,
            'jam_tutup' => $request->jam_tutup,
            'foto' => $imageName ?? null,
        ]);
        $bengkel->save();

        return response()->json(['message' => 'Data bengkel berhasil ditambah!!'], 201);
    }

    public function update(Request $request, Bengkel $bengkel)
    {
        // Validasi input
        $validator = Validator::make($request->all(), [
            'nama_bengkel' => 'sometimes|required',
            'deskripsi' => 'sometimes|required',
            'kategori' => 'sometimes|required',
            'lokasi' => 'sometimes|required',
            'jam_buka' => 'sometimes|required',
            'jam_tutup' => 'sometimes|required',
            'foto' => 'sometimes|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
    
        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }
    
        // Ambil semua input yang valid
        $input = $request->only([
            'nama_bengkel',
            'deskripsi',
            'kategori',
            'lokasi',
            'jam_buka',
            'jam_tutup',
        ]);
    
        // Handle foto jika ada
        if ($request->hasFile('foto')) {
            $imageName = time() . '.' . $request->file('foto')->getClientOriginalExtension();
            $request->file('foto')->move(public_path('images'), $imageName);
    
            // Hapus foto lama jika ada
            if ($bengkel->foto) {
                $imagePath = public_path('images/' . $bengkel->foto);
                if (file_exists($imagePath)) {
                    unlink($imagePath);
                }
            }
    
            // Simpan nama file foto baru
            $input['foto'] = $imageName;
        }
    
        // Update data bengkel
        $bengkel->update($input);
    
        return response()->json(['message' => 'Data bengkel berhasil diperbarui!!'], 200);
    }
    



    public function destroy(Bengkel $bengkel)
    {
        $imagePath = public_path('images/' . $bengkel->foto);
        if (file_exists($imagePath)) {
            unlink($imagePath);
        }

        $bengkel->delete();

        return response()->json(['message' => 'Data bengkel berhasil dihapus11'], 200);
    }
}