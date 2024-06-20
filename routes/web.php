<?php

use App\Http\Controllers\FieldController;
use Illuminate\Support\Facades\Route;

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


Route::get('/', function () {
    return view('welcome');
});

Route::get('/field',[FieldController::class,'index'])->name('field.index');

Route::get('/field/create',[FieldController::class,'create'])->name('field.create');

Route::post('/field/create/process',[FieldController::class,'store'])->name('field.store');

Route::get('/field/{id}',[FieldController::class,'show'])->name('field.show');

Route::get('/field/edit/{id}',[FieldController::class,'edit'])->name('field.edit');

Route::put('/field/update/{id}',[FieldController::class,'update'])->name('field.update');

Route::delete('/field/delete/{id}',[FieldController::class,'destroy'])->name('field.destroy');