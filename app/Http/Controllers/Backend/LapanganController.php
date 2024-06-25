<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Fasilitas;
use App\Models\Gallery;
use App\Models\Lapangan;
use App\Models\Rules;
use App\Models\Schedule;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class LapanganController extends Controller
{
    public function index()
    {
        $lapangan = Lapangan::all();
        return view('admin.lapangan.index', compact('lapangan'));
    }

    public function create()
    {
        $fasilitas = Fasilitas::all();
        $rules = Rules::all();
        return view('admin.lapangan.create', compact('fasilitas', 'rules'));
    }

    public function store(Request $request)
    {
        // Validasi input
        $validatedData = $request->validate([
            'image' => 'required|image',
            'title' => 'required|string|max:255',
            'price' => 'required|string',
            'fasilitas' => 'required|array',
            'fasilitas.*' => 'string',
            'rules' => 'required|array',
            'rules.*' => 'string'
        ]);

        // Upload gambar
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('assets', 'public');
        } else {
            return redirect()->back()->with('error', 'File gambar tidak ditemukan.');
        }

        // Simpan data lapangan
        $lapangan = Lapangan::create([
            'image' => $imagePath, // Simpan path gambar
            'title' => $validatedData['title'],
            'price' => $validatedData['price'],
            'fasilitas' => json_encode($validatedData['fasilitas']),
            'rules' => json_encode($validatedData['rules']),
        ]);

        // Simpan data ke table galleries
        Gallery::create([
            'lapangan_id' => $lapangan->id,
            'gallery' => $imagePath,
        ]);

        // Buat jadwal untuk 7 hari ke depan
        $startDate = Carbon::now();
        $endDate = $startDate->copy()->addDays(7);

        for ($date = $startDate; $date->lte($endDate); $date->addDay()) {
            for ($hour = 0; $hour < 24; $hour++) {
                // Misalnya, kita hanya buat jadwal pada jam-jam tertentu (boleh disesuaikan)
                if ($hour >= 9 && $hour <= 20) {
                    Schedule::create([
                        'lapangan_id' => $lapangan->id,
                        'date' => $date->toDateString(),
                        'hour' => $hour,
                        'status' => 'available',
                    ]);
                }
            }
        }

        return redirect()->route('lapangan.index')->with('success', 'Lapangan berhasil dibuat.');
    }

    public function edit($id)
    {
        $lapangan = Lapangan::find($id);
        $fasilitas = Fasilitas::all();
        $rules = Rules::all();

        return view('admin.lapangan.edit', compact('lapangan', 'fasilitas', 'rules'));
    }

    public function show($id)
    {
        $lapangan = Lapangan::find($id);
        return view('admin.lapangan.detail', compact('lapangan'));
    }

    public function update(Request $request, $id)
    {
        // Validasi input
        $validatedData = $request->validate([
            'image' => 'nullable|image',
            'title' => 'required|string|max:255',
            'price' => 'required|string',
            'fasilitas' => 'required|array',
            'fasilitas.*' => 'string',
            'rules' => 'required|array',
            'rules.*' => 'string'
        ]);

        // Temukan data lapangan berdasarkan ID
        $lapangan = Lapangan::findOrFail($id);

        // Upload gambar jika ada perubahan gambar
        if ($request->hasFile('image')) {
            // Hapus gambar lama jika ada
            if ($lapangan->image) {
                Storage::disk('public')->delete($lapangan->image);
            }

            // Simpan gambar baru
            $imagePath = $request->file('image')->store('assets', 'public');
            $lapangan->image = $imagePath; // Update path gambar
        }

        // Update data lapangan
        $lapangan->update([
            'title' => $validatedData['title'],
            'price' => $validatedData['price'],
            'fasilitas' => json_encode($validatedData['fasilitas']), // Update fasilitas sebagai JSON
            'rules' => json_encode($validatedData['rules']), // Update fasilitas sebagai JSON
        ]);

        return redirect()->route('lapangan.index')->with('success', 'Data lapangan berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $field = Lapangan::find($id);

        $field->delete();

        return redirect()->route('lapangan.index');
    }
}
