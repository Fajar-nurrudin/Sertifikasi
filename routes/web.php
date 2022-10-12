<?php

use App\Http\Controllers\ArsipController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ViewErrorBag;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect('arsip');
});
Route::get('/arsip', function () {
    return View('home');
});
Route::get('/arsip/index', [ArsipController::class, 'index'])->name('arsip.index');
Route::get('/arsip/tambah', [ArsipController::class, 'create'])->name('arsip.create');
Route::post('/arsip/store', [ArsipController::class, 'store'])->name('arsip.store');
Route::get('/arsip/lihat/{id}', [ArsipController::class, 'show'])->name('arsip.show');
Route::get('/arsip/edit/{id}', [ArsipController::class, 'edit'])->name('arsip.edit');
Route::post('/arsip/update/{id}', [ArsipController::class, 'update'])->name('arsip.update');
Route::get('/arsip/hapus/{id}', [ArsipController::class, 'destroy'])->name('arsip.destroy');
Route::get('/arsip/unduh/{id}', [ArsipController::class, 'unduh'])->name('arsip.unduh');
Route::get('/about', function () {
    return view('about');
});
