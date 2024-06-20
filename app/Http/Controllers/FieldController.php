<?php

namespace App\Http\Controllers;

use App\Models\Field;
use Illuminate\Http\Request;

class FieldController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Field::all();

        return view('field.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('field.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $data = $request->validate([
            'title' => 'required',
            'price' => 'required',
            // 'fasilitas_id' => 'required'
        ]);

        Field::create($data);

        return redirect()->route('field.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, $id)
    {
        $data = Field::find($id);

        return view('field.show',compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, $id)
    {
        $field = Field::find($id);

        return view('field.edit',compact('field'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $field = Field::findOrFail($id);

        $request->validate([
            'title' => 'required',
            'price' => 'required',
        ]);

        $field->update($request->all());

        return redirect()->route('field.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $field = Field::find($id);

        $field->delete();

        return redirect()->route('field.index');
    }
}
