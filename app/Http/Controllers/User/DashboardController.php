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
        $user = Auth::user();
        $bookings = Booking::where('user_id', $user->id)
            ->with('lapangan')
            ->get();
        return view('users.dashboard.history.index', compact('user', 'bookings'));
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
