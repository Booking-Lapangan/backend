<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        return view('users.dashboard.dashboard');
    }

    public function history()
    {
        return view('users.dashboard.history.index');
    }

    public function profile()
    {
        return view('users.dashboard.profile.index');
    }

    public function edit_profile(Request $request,$id)
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
