<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Lapangan;
use App\Models\Rules;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home()
    {
        $lapangan = Lapangan::all();
        return view('users.home', compact('lapangan'));
    }
    public function lapangan()
    {
        $lapangan = Lapangan::all();
        return view('users.lapangan', compact('lapangan'));
    }

    public function lapangan_detail($title)
    {
        $lapangan_detail = Lapangan::where('title', $title)->first();
        return view('users.lapangan', compact('lapangan_detail'));
    }

    public function gallery()
    {
        return view('users.gallery');
    }

    public function rules()
    {
        // $rules = Rules::where('title',$title)->first();
        return view('users.rules');
    }

    public function about()
    {
        return view('users.about');
    }
}
