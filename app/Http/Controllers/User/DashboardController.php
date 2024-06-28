<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        return view('users.dashboard.dashboard');
    }

    public function history()
    {
        $bookings = Booking::with(['lapangan', 'schedule'])->get();

        $groupedBookings = $bookings->groupBy(function ($item, $key) {
            return $item->schedule->date; 
        });

        foreach ($bookings as $booking) {
            $startHour = $booking->schedule->hour;
            $endHour = $startHour + 1;
            $booking->schedule->formatted_time = sprintf('%02d:00 - %02d:00', $startHour, $endHour);
        }

        return view('users.dashboard.history.index', compact('groupedBookings', 'bookings'));
    }

    public function profile()
    {
        return view('users.dashboard.profile.index');
    }

    public function edit_profile(Request $request, $id)
    {
        $user = User::find($id);

        $data = $request->validate([
            'name' => 'required|min:4',
            'phone' => 'required|min:11|max:13',
            'email' => 'required|email',
        ]);

        $user->update($data);

        return redirect()->back();
    }
}
