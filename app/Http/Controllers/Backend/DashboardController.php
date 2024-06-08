<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Traits\Fonnte;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {

        return view('welcome');
    }
}
