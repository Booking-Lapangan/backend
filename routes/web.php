<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Backend\MasterController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\FasilitasController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

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

// // Route untuk menampilkan form validasi OTP
// Route::get('/validasi-forgot-password/{otp}', [AuthController::class, 'validasi_forgot_password'])->name('validasi.forgot.password');

// // Route untuk menangani form validasi OTP
// Route::post('/validasi-forgot-password-act', [AuthController::class, 'validasi_forgot_password_act'])->name('validasi.forgot.password.act');

// Route untuk menangani form reset password
Route::post('/password/update', [AuthController::class, 'update_password'])->name('password.update');

//Route Dashboard
Route::prefix('admin')->middleware('auth')->group(function(){
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    //Master
    Route::get('/master', [MasterController::class, 'index'])->name('master');

    //FAsilitas
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
});
