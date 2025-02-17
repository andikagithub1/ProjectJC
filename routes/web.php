<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MembershipController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\BasicController;
use App\Http\Controllers\GuruController;

/*
|----------------------------------------------------------------------
| Web Routes
|----------------------------------------------------------------------
|
| Here is where you can register web routes for your application.
| These routes are loaded by the RouteServiceProvider within a group
| which contains the "web" middleware group. Now create something great!
|
*/

// Halaman utama
Route::get('/', function () {
    return view('welcome');
});

// Home
Route::get('/home', [HomeController::class, 'index'])->name('home');

// Profile
Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');

// About
Route::get('/about', function () {
    return view('about');
})->name('about');

// Halaman Blank
Route::get('/blank', [MembershipController::class, 'index'])->name('blank');

// Middleware untuk halaman yang membutuhkan autentikasi
Route::middleware('auth')->group(function () {
    // Route untuk Membership
    Route::resource('membership', MembershipController::class);
    Route::resource('basic', BasicController::class);

    // Route untuk Guru
    Route::get('/guru', [GuruController::class, 'index'])->name('guru.index');
    Route::get('/guru/profile', [GuruController::class, 'profile'])->name('guru.profile');
    Route::put('/guru/profile', [GuruController::class, 'update'])->name('guru.profile.update');
    Route::get('/guru/settings', [GuruController::class, 'settings'])->name('guru.settings');
});
