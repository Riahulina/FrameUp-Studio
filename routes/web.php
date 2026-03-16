<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PemesananController;
use App\Http\Controllers\PembayaranController;
use App\Http\Controllers\SurveiController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FrameController;
/*
|--------------------------------------------------------------------------
| Web Routes — FrameUp Studio
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('pages.home');
})->name('home');

Route::get('/about', function () {
    return view('pages.about');
})->name('about');

Route::get('/services', function () {
    return view('pages.services');
})->name('services');

Route::get('/works', function () {
    return view('pages.works');
})->name('works');

Route::get('/contact', function () {
    return view('pages.contact');
})->name('contact');

Route::post('/contact', function () {
    // TODO: Handle contact form submission
    // e.g. send email via Mail facade or store to database
    return redirect()->route('contact')->with('success', 'Thank you! We\'ll get back to you within 24 hours.');
})->name('contact.send');




Route::get('/works', [FrameController::class,'works'])->name('works');


Route::get('/dashboard', [DashboardController::class, 'index']);
Route::get('/pemesanan/create', [PemesananController::class, 'create']);
Route::post('/pemesanan/store', [PemesananController::class, 'store']);
Route::post('/pembayaran/store', [PembayaranController::class, 'store']);
Route::post('/survei/store', [SurveiController::class, 'store']);