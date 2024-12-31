<?php

use App\Http\Controllers\AccessoryController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\GameController;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PesananController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\TransaksiChart;

Route::get('/', [LandingPageController::class, 'index']);
Route::get('/product', [LandingPageController::class, 'product']);
Route::get('/product-detail/{id}', [LandingPageController::class, 'productDetail']);
Route::post('/product/cart', [LandingPageController::class, 'tambahKeranjang']);    
Route::post('/product/cart/detail', [LandingPageController::class, 'tambahKeranjangGD']);    
Route::get('/product/cart', [LandingPageController::class, 'keranjang']); 
Route::delete('/cart/remove/{id}', [LandingPageController::class, 'remove'])->name('cart.remove');
Route::patch('/cart/update/{id}/{operation}', [LandingPageController::class, 'update'])->name('cart.update');
Route::get('/aksesoris', [LandingPageController::class, 'aksesoris']);
Route::post('/aksesoris/cart', [LandingPageController::class, 'tambahKeranjangA']);  
Route::post('/aksesoris/cart/detail', [LandingPageController::class, 'tambahKeranjangGA']);    
Route::get('/aksesoris-detail/{id}', [LandingPageController::class, 'aksesorisDetail']);
Route::get('/profile', [LandingPageController::class, 'profile']);
Route::get('/contact', [LandingPageController::class, 'contact']);
Route::post('/contact', [LandingPageController::class, 'tambahKritikSaran']);
Route::get('/faq', [LandingPageController::class, 'faq']);
Route::post('/pembayaran', [LandingPageController::class, 'pembayaran']);    
Route::get('/pembayaran', [LandingPageController::class, 'pembayaran']); 
Route::patch('/pembayaran/update', [LandingPageController::class, 'updateBayar']);
Route::patch('/pesanan/updatestatus', [PesananController::class, 'updateStatus']);

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);
Route::get('/register', [RegisterController::class, 'create'])->name('register.create');
Route::post('/register', [RegisterController::class, 'store'])->name('register.store');

Route::resource('/dashboard', DashboardController::class);
Route::resource('/users', UserController::class);
Route::resource('/games', GameController::class);
Route::put('/games/{produk}', [GameController::class, 'update']);
Route::resource('/accessories', AccessoryController::class);
Route::put('/accessories/{produk}', [AccessoryController::class, 'update']);

Route::resource('/transaksi', TransaksiController::class);
Route::resource('/daftar-pesanan', PesananController::class);
Route::post('/transaksi/simpan', [TransaksiController::class, 'simpan']);
Route::get('/laporan-transaksi', [TransaksiController::class, 'laporan']);
Route::get('/laporan-pesanan', [PesananController::class, 'laporan']);
Route::get('/riwayat', [LandingPageController::class, 'riwayat']);
Route::get('/riwayat-detail/{no_transaksi}/view', [LandingPageController::class, 'riwayatDetail'])->name('riwayat.view');

Route::get('/laporan-transaksi/{id}/view', [TransaksiController::class, 'view']);
Route::resource('/kritiksaran', ContactController::class);
Route::get('/daftar-pesanan/{no_transaksi}/edit', [PesananController::class, 'edit'])->name('pesanan.edit');
Route::get('/laporan-pesanan/{no_transaksi}/view', [PesananController::class, 'view'])->name('pesanan.view');
Route::post('/calculate-shipping', [LandingPageController::class, 'calculateShipping']);
