<?php

namespace App\Http\Controllers;


use App\Models\Bengkel;
use App\Models\Backpage;
use App\Models\Perusahaan;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;



class BengkelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $keyword = $request->input('keyword');
    
        $backpages = Bengkel::when($keyword, function ($query) use ($keyword) {
            $query->where('nama_bengkel', 'like', "%$keyword%");
        })->paginate(5)->withQueryString();

        return view('backpages.bengkel-index', compact('backpages'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = Bengkel::all();
        return view('backpages.bengkel-create', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     */
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
        ], [
            'nama_bengkel.required' => 'required',
            'foto.required' => 'required',
            'deskripsi.required' => 'The deskripsi field is required.',
            'kategori.required' => 'The kategori field is required.',
            'lokasi.required' => 'required',
            'jam_buka.required' => 'The jam buka field is required.',
            'jam_tutup.required' => 'The jam tutup field is required.',
        ]);
    
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
    
        // Memproses dan menyimpan gambar
        if ($request->hasFile('foto')) {
            $imageName = time().'.'.$request->file('foto')->getClientOriginalExtension();
            $request->file('foto')->move(public_path('images'), $imageName);
        }
    
        // Simpan data ke dalam database
        $backpage = new Bengkel([
            'nama_bengkel' => $request->nama_bengkel,
            'deskripsi' => $request->deskripsi,
            'kategori' => $request->kategori,
            'lokasi' => $request->lokasi,
            'jam_buka' => $request->jam_buka,
            'jam_tutup' => $request->jam_tutup,
            'foto' => $imageName ?? null, // Pastikan untuk menyimpan nama file gambar
        ]);
        $backpage->save();
    
        return redirect()->route('backpages.index')
                        ->with('success','Bengkel created successfully');
    }
    

    /**
     * Display the specified resource.
     */
    public function show(Bengkel $backpage)
    {
        return view('backpages.show',compact('backpage'));
    }

    public function edit(Bengkel $backpage)
    {
        return view('backpages.bengkel-edit',compact('backpage'));
    }

    // Fungsi Update
    public function update(Request $request, Bengkel $backpage)
    {
        $validator = Validator::make($request->all(), [
            'nama_bengkel' => 'required',
            'nama_perusahaan' => 'required',
            'deskripsi' => 'required',
            'kategori' => 'required',
            'lokasi' => 'required',
            'jam_buka' => 'required',
            'jam_tutup' => 'required',
            'foto' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // ... (validasi pesan error)

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        if ($request->hasFile('foto')) {
            $imageName = time() . '.' . $request->file('foto')->getClientOriginalExtension();
            $request->file('foto')->move(public_path('images'), $imageName);

            $imagePath = public_path('images/' . $backpage->foto); // Ganti 'foto' dengan field yang sesuai
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }

            $backpage->update([
                'nama_bengkel' => $request->nama_bengkel,
                'deskripsi' => $request->deskripsi,
                'kategori' => $request->kategori,
                'lokasi' => $request->lokasi,
                'jam_buka' => $request->jam_buka,
                'jam_tutup' => $request->jam_tutup,
                'foto' => $imageName,
            ]);
        } else {
            $backpage->update([
                'nama_bengkel' => $request->nama_bengkel,
                'deskripsi' => $request->deskripsi,
                'kategori' => $request->kategori,
                'lokasi' => $request->lokasi,
                'jam_buka' => $request->jam_buka,
                'jam_tutup' => $request->jam_tutup,
            ]);
        }

        return redirect()->route('backpages.index')
                        ->with('success', 'Bengkel updated successfully');
    }


    public function destroy(Bengkel $backpage)
    {
        $backpage->delete();

        return redirect()->route('backpages.index')
                        ->with('success','Bengkel deleted successfully');
    }

}
