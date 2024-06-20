<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Backend\DashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\RulesController;
use App\Http\Controllers\User\DashboardController as UserDashboardController;
use App\Http\Controllers\UsersDashboard;

// Route::get('/', function () {
//  return view('users.home');
// });

Route::get('lapangan', function () {
 return view('users.lapangan');
});

Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login/process', [AuthController::class, 'login_process'])->name('login.process');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/register/process', [AuthController::class, 'register_process'])->name('register.process');

Route::get('/verify', [AuthController::class, 'verify'])->name('verify');
Route::post('/verify/process', [AuthController::class, 'verify_process'])->name('verify.process');


Route::get('/forgot-password', [AuthController::class, 'forgot_password'])->name('forgot.password');
Route::post('/forgot-password-act', [AuthController::class, 'forgot_password_act'])->name('forgot.password.act');

Route::get('/validasi-forgot-password/{otp}', [AuthController::class, 'validasi_forgot_password'])->name('validasi.forgot.password');
Route::post('/validasi-forgot-password-act', [AuthController::class, 'validasi_forgot_password_act'])->name('validasi.forgot.password.act');


Route::get('/', [UsersDashboard::class, 'home'])->name('home');
Route::get('/lapangan', [UsersDashboard::class, 'lapangan'])->name('lapangan');
Route::get('/gallery', [UsersDashboard::class, 'gallery'])->name('gallery');
Route::get('/rules', [UsersDashboard::class, 'rules'])->name('rules');
Route::get('/about', [UsersDashboard::class, 'about'])->name('about');

Route::prefix('user')->middleware('auth')->group(function() {
    Route::get('/dashboard',[UserDashboardController::class,'index'])->name('user.dashboard');
    Route::get('/history',[UserDashboardController::class,'history'])->name('user.history');
    Route::get('/profile',[UserDashboardController::class,'profile'])->name('user.profile');
    Route::put('/edit-profile/{id}',[UserDashboardController::class,'edit_profile'])->name('user.edit.profile');
});

Route::prefix('admin')->middleware('auth','admin')->group(function() {
    Route::get('/dashboard',[DashboardController::class,'index'])->name('dashboard');
    Route::resource('rules', RulesController::class);
    Route::post('rules/storeMultiple', [RulesController::class, 'storeMultiple'])->name('rules.storeMultiple');
});