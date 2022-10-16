<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MitraController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\VariabelController;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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



Route::middleware(['landing'])->group(function () {
    Route::get('/', [HomeController::class, 'index']);

    Route::get('/about', [AboutController::class, 'aboutus']);
    Route::get('/about/{about}', [AboutController::class, 'aboutus']);

    Route::get('/news', [NewsController::class, 'news']);
    Route::get('/news/{news}', [NewsController::class, 'newsDetail']);

    Route::get('/produk/individu', [ProdukController::class, 'individu']);
    Route::get('/produk/kumpulan', [ProdukController::class, 'kumpulan']);
    Route::get('/produk/kumpulan/{produk}', [ProdukController::class, 'kumpulan']);
});





// cms
Route::get('/c/dashboard', [DashboardController::class, 'index'])->middleware('auth');
Route::get('/c/news', [NewsController::class, 'index'])->middleware('auth');
Route::get('/c/produk/kumpulan', [ProdukController::class, 'index_kumpulan'])->middleware('auth');
Route::get('/c/produk/individu', [ProdukController::class, 'index_individu'])->middleware('auth');
Route::post('/upload', [NewsController::class, 'upload']);
Route::get('/c/news/checkSlug', [NewsController::class, 'checkSlug'])->middleware('auth');
Route::get('/c/about/checkSlug', [AboutController::class, 'checkSlug'])->middleware('auth');
Route::get('/c/produk/checkSlug', [ProdukController::class, 'checkSlug'])->middleware('auth');
Route::get('/c/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/c/login', [LoginController::class, 'authenticate']);
Route::get('/c/register', [RegisterController::class, 'index']);
Route::post('/c/logout', [LoginController::class, 'logout']);

Route::resource('/c/news', NewsController::class)->middleware('auth');
Route::resource('/c/kategori', KategoriController::class)->middleware('auth');
Route::resource('/c/mitra', MitraController::class)->middleware('auth');
Route::resource('/c/about', AboutController::class)->middleware('auth');
Route::resource('/c/produk', ProdukController::class)->middleware('auth');
Route::resource('/c/variabel', VariabelController::class)->middleware('super');
