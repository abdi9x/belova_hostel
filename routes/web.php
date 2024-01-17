<?php

use App\Http\Controllers\PagesController;
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

Route::get('/', [PagesController::class, 'home'])->name('home');
Route::get('/pilihan-kamar', [PagesController::class, 'rooms'])->name('Pilihan-Kamar');
Route::get('/fasilitas', [PagesController::class, 'fasilitas'])->name('fasilitas');
Route::get('/galeri-foto', [PagesController::class, 'galery'])->name('galeri-foto');
Route::get('/pilihan-kamar/{slug}', [PagesController::class, 'view_room'])->name('view_room');
