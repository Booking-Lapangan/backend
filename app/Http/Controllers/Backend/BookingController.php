<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\DetailBooking;
use App\Models\Schedule;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function addToCart(Request $request)
    {
        // Validate request
        $request->validate([
            'hour' => 'required|integer',
            'date' => 'required|date',
            'lapangan_id' => 'required|exists:lapangans,id',
        ]);

        // Find the schedule based on hour, date, and lapangan
        $schedule = Schedule::where('lapangan_id', $request->lapangan_id)
            ->whereDate('date', $request->date)
            ->where('hour', $request->hour)
            ->first();

        // If the schedule is found, change its status to 'booked'
        if ($schedule) {
            $schedule->status = 'booked';
            $schedule->save();

            // Create a new booking with the found schedule's ID
            $book = new Booking();
            $book->user_id = Auth::id();
            $book->lapangan_id = $request->lapangan_id;
            $book->schedule_id = $schedule->id; // Assign the schedule ID
            $book->date = $request->date;
            $book->status = 'booked';
            $book->save();

            return response()->json(['success' => true]);
        }

        return response()->json(['success' => false, 'message' => 'Schedule not found'], 404);
    }

    public function removeFromCart(Request $request)
    {
        // Validasi request
        $request->validate([
            'hour' => 'required|integer',
            'date' => 'required|date',
            'lapangan_id' => 'required|exists:lapangans,id', // Gantilah 'lapangans' dengan nama tabel lapangan yang sesuai
        ]);

        // Cari jadwal yang sesuai berdasarkan jam, tanggal, dan lapangan
        $schedule = Schedule::where('lapangan_id', $request->lapangan_id)
            ->whereDate('date', $request->date)
            ->where('hour', $request->hour)
            ->first();

        // Jika jadwal ditemukan, ubah statusnya menjadi 'Available'
        if ($schedule) {
            $schedule->status = 'available';
            $schedule->save();
        }

        $book = Booking::where('user_id', Auth::id())
            ->where('lapangan_id', $request->input('lapangan_id'))
            ->where('schedule_id', $schedule->id)
            ->where('date', $request->input('date'))
            ->first();

        if ($book) {
            $book->delete();
            return response()->json(['success' => true]);
        }


        return response()->json(['success' => true]);
    }

    public function viewCart()
    {
        $user = Auth::user(); // Mengambil user yang sedang login
        $bookings = Booking::where('user_id', $user->id)
            ->with('lapangan', 'schedule', 'detailBooking') // Sertakan relasi detailBooking
            ->get();

        // Group bookings by lapangan title and tanggal
        $groupedBookings = $bookings->groupBy(function ($booking) {
            return $booking->lapangan->title . '-' . $booking->schedule->tanggal;
        });

        // Format waktu booking
        foreach ($bookings as $booking) {
            $startHour = $booking->schedule->hour;
            $endHour = $startHour + 1; // Asumsikan setiap booking berdurasi satu jam
            $booking->schedule->formatted_time = sprintf('%02d:00 - %02d:00', $startHour, $endHour);
        }

        // Ambil harga dari lapangan untuk setiap booking
        foreach ($groupedBookings as $key => $bookings) {
            // Ambil lapangan dari booking pertama (asumsi semua booking dalam grup ini memiliki lapangan yang sama)
            $lapangan = $bookings->first()->lapangan;

            // Ambil harga dari lapangan
            $hargaLapangan = floatval($lapangan->price); // Ubah ke float jika price berupa varchar

            // Set harga lapangan ke setiap booking
            foreach ($bookings as $booking) {
                $booking->lapangan->price = $hargaLapangan;
            }
        }

        return view('users.booking.cart', [
            'user' => $user,
            'groupedBookings' => $groupedBookings,
            'bookingCount' => $bookings->count(),
        ]);
    }

    public function submitBooking(Request $request, $bookingId)
    {
        // Validasi request
        $validatedData = $request->validate([
            'nama_tim' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'no_hp' => 'required|string|max:20',
            'note' => 'nullable|string',
        ]);

        // Cari booking berdasarkan $bookingId
        $booking = Booking::findOrFail($bookingId)->first();

        // Buat detail booking baru
        $detailBooking = new DetailBooking();
        $detailBooking->booking_id = $booking->id;
        $detailBooking->nama_tim = $request->nama_tim;
        $detailBooking->email = $request->email;
        $detailBooking->no_hp = $request->no_hp;
        $detailBooking->note = $request->note;
        $detailBooking->save();

        return view('users.dashboard.dashboard');
    }
}
