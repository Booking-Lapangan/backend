<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\FasilitasController;
use App\Http\Controllers\Backend\GalleryController;
use App\Http\Controllers\Backend\LapanganController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\RulesController;
use App\Http\Controllers\Frontend\HomeController;
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


Route::get('/', [HomeController::class, 'home'])->name('home');
Route::get('/lapangan/detail/{title}', [HomeController::class, 'lapangan'])->name('lapangan');
Route::get('/gallerys', [HomeController::class, 'gallery'])->name('gallery');
Route::get('/rules', [HomeController::class, 'rules'])->name('rules');
Route::get('/abouts', [HomeController::class, 'about'])->name('about');

Route::prefix('user')->middleware(['auth', 'checkrole:user'])->group(function() {
    Route::get('/dashboard',[UserDashboardController::class,'index'])->name('user.dashboard');
    Route::get('/history',[UserDashboardController::class,'history'])->name('user.history');
    Route::get('/profile',[UserDashboardController::class,'profile'])->name('user.profile');
    Route::put('/edit-profile/{id}',[UserDashboardController::class,'edit_profile'])->name('user.edit.profile');
});

Route::prefix('admin')->middleware(['auth', 'checkrole:admin'])->group(function() {
    Route::get('/dashboard',[DashboardController::class,'index'])->name('dashboard');
    Route::resource('rules', RulesController::class);
    Route::post('rules/storeMultiple', [RulesController::class, 'storeMultiple'])->name('rules.storeMultiple');

    Route::get('/lapangan',[LapanganController::class,'index'])->name('lapangan.index');

    Route::get('/lapangan/create',[LapanganController::class,'create'])->name('lapangan.create');

    Route::post('/lapangan/create/process',[LapanganController::class,'store'])->name('lapangan.store');

    Route::get('/lapangan/{id}',[LapanganController::class,'show'])->name('lapangan.show');

    Route::get('/lapangan/edit/{id}',[LapanganController::class,'edit'])->name('lapangan.edit');

    Route::put('/lapangan/update/{id}',[LapanganController::class,'update'])->name('lapangan.update');

    Route::delete('/lapangan/delete/{id}',[LapanganController::class,'destroy'])->name('lapangan.destroy');

    Route::get('/fasilitas', [FasilitasController::class, 'index'])->name('fasilitas.index');
        //create fasilitas
    Route::get('/fasilitas/create', [FasilitasController::class, 'create'])->name('fasilitas.create');
    Route::post('/fasilitas/create/process', [FasilitasController::class, 'store'])->name('fasilitas.create.process');
        //show fasilitas
    Route::get('/fasilitas/{id}', [FasilitasController::class, 'show'])->name('fasilitas.show');
        //edit fasilitas
    Route::get('/fasilitas/edit/{id}', [FasilitasController::class, 'edit'])->name('fasilitas.edit');
    Route::put('/fasilitas/update/{id}', [FasilitasController::class, 'update'])->name('fasilitas.update');
        //delete fasilitas
    Route::delete('/fasilitas/delete/{id}', [FasilitasController::class, 'destroy'])->name('fasilitas.delete');

    Route::get('/gallery/{title}',[GalleryController::class,'index'])->name('gallery.index');
    Route::post('/gallery/process',[GalleryController::class,'store'])->name('gallery.process');
});