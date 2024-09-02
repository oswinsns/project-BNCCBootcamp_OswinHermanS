<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\BuyerController;
use App\Http\Controllers\MailController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;

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
// Auth::routes();

Route::get('/', function () {
    return view('welcome');
    
});


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('admin')->group(function(){
    Route::get('/create', [BarangController::class, 'getCreatePage'])->name('getCreatePage');
//buat nampilin halaman form

Route::post('/create-barang', [BarangController::class, 'createBarang'])->name('createBarang');
//buat ngepost data create book

Route::get('/view', [BarangController::class, 'getBarangs'])->name('getBarangs');
// buat nampilin halaman view

Route::get('/update/{id}', [BarangController::class, 'getBarangById'])->name('getBarangById');
//buat tampilan form update

Route::patch('/update/{id}', [BarangController::class, 'updateBarang'])->name('updateBarang');
//buat update data ke database

Route::delete('/delete-barang/{id}', [BarangController::class, 'deleteBarang'])->name('deleteBarang');
//hapus data dari database
});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/get-books', [BarangController::class, 'getBooks'])->name('getBooks');
    // buat nampilin data
    Route::get('/userviewtemplate', [BarangController::class, 'getBarangss'])->name('getBarangss');
    Route::get('/cart', [CartController::class, 'getCart'])->name('getCart');
    //nampilin cart
    Route::post('/cartstore', [CartController::class, 'cartStore'])->name('cartStore');
    //buat masukin tabel cart
    Route::get('/cetak', [CartController::class, 'cetakBarang'])->name('cetakBarang');

    Route::get('/delete-nota', [CartController::class, 'deleteNota'])->name('deleteNota');
});

Route::get('/mail', [MailController::class, 'sendMail'])->name('sendMail');



Route::get('/', function () {
    return view('welcome');
});

require __DIR__.'/auth.php';
