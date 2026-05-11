<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PemesananController;
use App\Http\Controllers\PembayaranController;
use App\Http\Controllers\SurveiController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FrameController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\AdminController;


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

Route::get('/works', [FrameController::class, 'works'])->name('works');


// ================= PEMESANAN =================
Route::get('/pemesanan/create', [PemesananController::class, 'create'])
    ->name('pemesanan.create');

Route::post('/pemesanan/store', [PemesananController::class, 'store'])
    ->name('pemesanan.store');

// ================= ADMIN =================
Route::get('/pemesanan', [PemesananController::class, 'index']);
Route::get('/admin/chart', [PemesananController::class, 'chart']);

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
Route::get('/admin/pembayaran/{id}/status', [PembayaranController::class, 'updateStatus']);

/*
|--------------------------------------------------------------------------
| FRAME (CRUD)
|--------------------------------------------------------------------------
*/
Route::get('/frame', [FrameController::class, 'index']);
Route::get('/frame/create', [FrameController::class, 'create']);
Route::post('/frame/store', [FrameController::class, 'store']);
Route::get('/frame/delete/{id}', [FrameController::class, 'destroy']);


/*
|--------------------------------------------------------------------------
| CONTACT
|--------------------------------------------------------------------------
*/

// Form submit
Route::post('/contact', [ContactController::class, 'store']);

// Admin page
Route::get('/contacts', [ContactController::class, 'index']);
Route::get('/admin/contacts/{id}', [ContactController::class, 'show']);

Route::get('/laporan', [LaporanController::class, 'index']);
Route::get('/laporan/download', [LaporanController::class, 'downloadPdf']);
