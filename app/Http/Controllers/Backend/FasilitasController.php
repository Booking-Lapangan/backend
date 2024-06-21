<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Fasilitas;
use Illuminate\Http\Request;

class FasilitasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Fasilitas::all();
        return view('admin.fasilitas.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.fasilitas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'detail_fasilitas' => 'required|max:255',
            'descripsi' => 'required|max:255',
        ]);

        Fasilitas::create($data);

        return redirect()->route('fasilitas.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $fasilitas = Fasilitas::findOrFail($id);

        return view('admin.fasilitas.show', compact('fasilitas'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $fasilitas = Fasilitas::find($id);

        return view('admin.fasilitas.edit', compact('fasilitas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $fasilitas = Fasilitas::findOrFail($id);

        $request->validate([
            'name' => 'required',
            'detail_fasilitas' => 'required',
            'descripsi' => 'required'
        ]);

        $fasilitas->update($request->all());

        return redirect()->route('fasilitas.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = Fasilitas::findOrFail($id);

        $data->delete();

        return redirect()->route('fasilitas.index');
    }
}
