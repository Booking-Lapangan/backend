<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use App\Models\Lapangan;
use App\Models\Rules;

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
        $gallery = Gallery::all();
        return view('users.gallery', compact('gallery'));
    }

    public function rules()
    {

        $rulesInField = Rules::where('id_category', 1)->get();
        $rulesOutField = Rules::where('id_category', 2)->get();
        $rulesRent = Rules::where('id_category', 3)->get();

        return view('users.rules', compact('rulesInField', 'rulesOutField', 'rulesRent'));
    }

    public function about()
    {
        return view('users.about');
    }

    
}
