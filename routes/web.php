<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\CKEditorController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\GaleriController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MitraController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\UserController;
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


Route::middleware(['auth'])->group(function () {
    Route::get('/c/dashboard', [DashboardController::class, 'index']);
    Route::get('/c/news', [NewsController::class, 'index']);
    Route::get('/c/produk/kumpulan', [ProdukController::class, 'index_kumpulan']);
    Route::get('/c/produk/individu/top', [ProdukController::class, 'index_top_individu']);
    Route::get('/c/produk/individu/bot', [ProdukController::class, 'index_bottom_individu']);
    Route::post('/c/produk/individu/top', [ProdukController::class, 'save_top_individu']);
    Route::post('/c/produk/individu/bottom', [ProdukController::class, 'save_bottom_individu']);
    Route::get('/c/news/checkSlug', [NewsController::class, 'checkSlug']);
    Route::get('/c/about/checkSlug', [AboutController::class, 'checkSlug']);
    Route::get('/c/produk/checkSlug', [ProdukController::class, 'checkSlug']);
    Route::get('/c/user/profile', [UserController::class, 'profile']);
    Route::put('/c/user/profile', [UserController::class, 'updateProfile']);
    Route::delete('/c/image/{image}/delete', [GaleriController::class, 'imageDestroy']);

    Route::resource('/c/user', UserController::class);
    Route::resource('/c/news', NewsController::class);
    Route::resource('/c/kategori', KategoriController::class);
    Route::resource('/c/mitra', MitraController::class);
    Route::resource('/c/about', AboutController::class);
    Route::resource('/c/produk', ProdukController::class);
    Route::resource('/c/galeri', GaleriController::class);
});


// cms

Route::post('/upload', [NewsController::class, 'upload']);
Route::post('editor/image_upload', [CKEditorController::class, 'upload'])->name('ckeditor_upload');

Route::get('/c/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/c/login', [LoginController::class, 'authenticate']);
Route::get('/c/register', [RegisterController::class, 'index']);
Route::post('/c/logout', [LoginController::class, 'logout']);


Route::resource('/c/variabel', VariabelController::class)->middleware('super');
