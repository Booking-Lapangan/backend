<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use App\Models\Lapangan;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($id)
    {
        $lapangan = Lapangan::where('id', $id)->first();
        $gallery = Gallery::where('lapangan_id', $lapangan->id)->get();
        // dd($gallery);
        return view('admin.gallery.index', compact('lapangan', 'gallery'));
    }


    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'lapangan_id' => 'required',
            'gallery' => 'required',
        ]);

        if ($request->hasFile('gallery')) {
            $imagePath = $request->file('gallery')->store('assets', 'public');
        } else {
            return redirect()->back()->with('error', 'File gambar tidak ditemukan.');
        }

        Gallery::create([
            'lapangan_id' => $request->lapangan_id,
            'gallery' => $imagePath, // Simpan path gambar
        ]);

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
