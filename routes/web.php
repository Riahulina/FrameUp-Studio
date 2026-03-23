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


// Route::get('/dashboard', [DashboardController::class, 'index']);
// Route::get('/pemesanan/create', [PemesananController::class, 'create']);
// Route::post('/pemesanan/store', [PemesananController::class, 'store']);
// Route::post('/pembayaran/store', [PembayaranController::class, 'store']);
// Route::post('/survei/store', [SurveiController::class, 'store']);

// Route::get('/pemesanan', [App\Http\Controllers\PemesananController::class, 'index']);
// Route::post('/pemesanan', [App\Http\Controllers\PemesananController::class, 'store']);



// Route::get('/pembayaran/{id}', [PembayaranController::class, 'create']);
// Route::post('/pembayaran', [PembayaranController::class, 'store']);
// Route::get('/struk/{id}', [PembayaranController::class, 'struk']);
// Route::get('/struk/{id}/download', [PembayaranController::class, 'download']);

// Route::get('/admin', [DashboardController::class, 'index']);



// ================= PEMESANAN =================
Route::get('/pemesanan/create', [PemesananController::class, 'create'])
    ->name('pemesanan.create');

Route::post('/pemesanan/store', [PemesananController::class, 'store'])
    ->name('pemesanan.store');

// ================= ADMIN =================
Route::get('/pemesanan', [PemesananController::class, 'index']);

/*
|--------------------------------------------------------------------------
| PEMBAYARAN
|--------------------------------------------------------------------------
*/
Route::get('/pembayaran/{id}', [PembayaranController::class, 'create'])
    ->name('pembayaran.create');

Route::post('/pembayaran', [PembayaranController::class, 'store'])
    ->name('pembayaran.store');

// 🔥 ANTI ERROR kalau akses tanpa ID
Route::get('/pembayaran', function () {
    return redirect('/');
});

/*
|--------------------------------------------------------------------------
| STRUK
|--------------------------------------------------------------------------
*/
Route::get('/struk/{id}', [PembayaranController::class, 'struk']);
Route::get('/struk/{id}/download', [PembayaranController::class, 'download']);

/*
|--------------------------------------------------------------------------
| ADMIN
|--------------------------------------------------------------------------
*/
Route::get('/dashboard', [DashboardController::class, 'index']);

Route::get('/pemesanan', [PemesananController::class, 'index']);
Route::get('/pemesanan/status/{id}', [PemesananController::class, 'updateStatus']);

Route::get('/pembayaran', [PembayaranController::class, 'index']);
Route::get('/admin/pembayaran/status/{id}', [PembayaranController::class, 'updateStatus']);

/*
|--------------------------------------------------------------------------
| FRAME (CRUD)
|--------------------------------------------------------------------------
*/
Route::get('/frame', [FrameController::class, 'index']);
Route::get('/frame/create', [FrameController::class, 'create']);
Route::post('/frame/store', [FrameController::class, 'store']);
Route::get('/frame/delete/{id}', [FrameController::class, 'destroy']);