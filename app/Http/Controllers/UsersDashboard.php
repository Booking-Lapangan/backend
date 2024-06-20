<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UsersDashboard extends Controller
{
    public function home()
    {
        return view('users.home');
    }

    public function lapangan()
    {
        return view('users.lapangan');
    }

    public function gallery()
    {
        return view('users.gallery');
    }

    public function rules()
    {
        return view('users.rules');
    }

    public function about()
    {
        return view('users.about');
    }
}
