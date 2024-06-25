<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\DetailBooking;
use Illuminate\Http\Request;

class DetailBookingController extends Controller
{
    public function index()
    {
        $detail = DetailBooking::all();
        return view('admin.booking.index', compact('detail'));
    }

    public function show(string $id)
    {
        $detail = DetailBooking::findOrFail($id);

        return view('admin.booking.show', compact('detail'));
    }

    public function destroy(string $id)
    {
        $data = DetailBooking::findOrFail($id);

        $data->delete();

        return redirect()->route('booking.index');
    }
}
