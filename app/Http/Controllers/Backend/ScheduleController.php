<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Lapangan;
use App\Models\Schedule;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    public function index(Request $request)
    {
        $selectedDate = $request->input('date', now()->toDateString());
        $selectedLapanganId = $request->input('lapangan_id', 1);

        $lapangans = Lapangan::all();
        $schedules = Schedule::where('date', $selectedDate)
            ->where('lapangan_id', $selectedLapanganId)
            ->get()
            ->keyBy('hour');

        return view('users.booking.index', compact('lapangans', 'schedules', 'selectedDate', 'selectedLapanganId'));
    }

    public function getSchedules(Request $request)
    {
        $schedules = Schedule::where('lapangan_id', $request->lapangan_id)
            ->whereDate('date', $request->date)
            ->get();
        return response()->json($schedules);
    }

    public function schedule(Request $request)
    {

        $request->validate([
            'lapangan_id' => 'required|exists:lapangans,id',
            'schedule_id' => 'required|exists:schedules,id',
            'date' => 'required|date',
        ]);

        $booking = new Booking();
        $booking->lapangan_id = $request->lapangan_id;
        $booking->schedule_id = $request->schedule_id;
        $booking->date = $request->date;
        $booking->status = 'cart';

        $booking->user_id = auth()->id();

        $booking->save();

        return response()->json(['success' => true, 'booking' => $booking]);
    }
}
