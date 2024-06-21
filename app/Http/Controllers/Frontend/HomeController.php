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
        return view('users.home',compact('lapangan'));
    }

    public function lapangan($title)
    {
        $lapangan = Lapangan::where('title',$title)->first();
        return view('users.lapangan',compact('lapangan'));
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
