<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\BrosurController;
use App\Http\Controllers\BrosurKategoriController;
use App\Http\Controllers\CKEditorController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FAQController;
use App\Http\Controllers\GaleriController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\KeuanganController;
use App\Http\Controllers\KlaimController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MitraController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\RequestController;
use App\Http\Controllers\SimulasiController;
use App\Http\Controllers\SliderController;
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

    Route::get('/brosur', [BrosurController::class, 'brosur']);
    Route::get('/brosur/{brosur}', [BrosurController::class, 'brosurDetail']);

    Route::get('/galeri', [GaleriController::class, 'galeri']);
    Route::get('/galeri/{galeri}', [GaleriController::class, 'galeriDetail']);

    Route::get('/produk/individu', [ProdukController::class, 'individu']);
    Route::get('/produk/kumpulan', [ProdukController::class, 'kumpulan']);
    Route::get('/produk/kumpulan/{produk}', [ProdukController::class, 'kumpulan']);

    Route::get('/mitra/rekanan', [MitraController::class, 'rekanan']);
    Route::get('/mitra/klien', [MitraController::class, 'klien']);

    Route::get('/klaim/prosedur', [KlaimController::class, 'prosedur_view']);
    Route::get('/klaim/faq', [KlaimController::class, 'faq_view']);
    Route::get('/klaim/info', [KlaimController::class, 'info_view']);

    Route::get('/simulasi/produk', [SimulasiController::class, 'pilih_produk']);
    Route::get('/simulasi/karyawan', [SimulasiController::class, 'karyawan']);
    Route::get('/simulasi/keluarga', [SimulasiController::class, 'keluarga']);
    Route::get('/simulasi/umkm', [SimulasiController::class, 'umkm']);
    Route::get('/form', [SimulasiController::class, 'form_request']);

    Route::post('/request', [RequestController::class, 'store']);
});


Route::middleware(['auth'])->group(function () {
    Route::get('/c', function () {
        return redirect('/c/about');
    });
    Route::get('/c/dashboard', [DashboardController::class, 'index']);
    // Route::get('/c/news', [NewsController::class, 'index']);
    Route::get('/c/produk/kumpulan', [ProdukController::class, 'index_kumpulan'])->name('index_kumpulan');
    Route::get('/c/produk/individu/top', [ProdukController::class, 'index_top_individu']);
    Route::get('/c/produk/individu/bot', [ProdukController::class, 'index_bottom_individu']);
    Route::get('/c/produk/individu/table', [ProdukController::class, 'editTable']);
    Route::get('/c/produk/individu/diagram', [ProdukController::class, 'editDiagram']);
    Route::get('/c/produk/individu/syarat', [ProdukController::class, 'editSyarat']);
    Route::post('/c/produk/individu/table', [ProdukController::class, 'saveTable']);
    Route::post('/c/produk/individu/diagram', [ProdukController::class, 'saveDiagram']);
    Route::post('/c/produk/individu/syarat', [ProdukController::class, 'saveSyarat']);
    Route::post('/c/produk/individu/top', [ProdukController::class, 'save_top_individu']);
    Route::post('/c/produk/individu/bottom', [ProdukController::class, 'save_bottom_individu']);
    Route::get('/c/news/checkSlug', [NewsController::class, 'checkSlug']);
    Route::get('/c/brosur/checkSlug', [BrosurController::class, 'checkSlug']);
    Route::get('/c/about/checkSlug', [AboutController::class, 'checkSlug']);
    Route::get('/c/produk/checkSlug', [ProdukController::class, 'checkSlug']);
    Route::get('/c/galeri/checkSlug', [GaleriController::class, 'checkSlug']);
    Route::get('/c/user/profile', [UserController::class, 'profile']);
    Route::put('/c/user/profile', [UserController::class, 'updateProfile']);
    Route::get('/c/user/password', [UserController::class, 'changePassword']);
    Route::put('/c/user/password', [UserController::class, 'updatePassword']);

    Route::delete('/c/image/{image}/delete', [GaleriController::class, 'imageDestroy']);
    Route::delete('/c/file/{file}/delete', [AboutController::class, 'fileDestroy']);
    Route::delete('/c/file_brosur/{file_brosur}/delete', [BrosurController::class, 'fileDestroy']);

    Route::get('/c/faq', [KlaimController::class, 'faq']);
    Route::post('/c/faq', [KlaimController::class, 'faq_save']);

    Route::get('/c/prosedur', [KlaimController::class, 'prosedur']);
    Route::post('/c/prosedur', [KlaimController::class, 'prosedur_save']);

    // Route::get('/request', [RequestController::class, 'index']);

    Route::resource('/c/user', UserController::class);
    Route::resource('/c/news', NewsController::class);
    Route::resource('/c/brosur', BrosurController::class);
    Route::resource('/c/kategori', KategoriController::class);
    Route::resource('/c/category_brosur', BrosurKategoriController::class);
    Route::resource('/c/mitra', MitraController::class);
    Route::resource('/c/about', AboutController::class);
    Route::resource('/c/produk', ProdukController::class);
    Route::resource('/c/galeri', GaleriController::class);
    Route::resource('/c/slider', SliderController::class);
    Route::resource('/c/request', RequestController::class);
    Route::resource('/c/banner', BannerController::class);
    Route::resource('/c/keuangan', KeuanganController::class);

    // datatables
    Route::get('/datatables/news', [NewsController::class, 'getIndex']);
});


// cms
Route::post('/upload', [NewsController::class, 'upload']);
Route::post('editor/image_upload', [CKEditorController::class, 'upload'])->name('ckeditor_upload');
Route::get('/c/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/c/login', [LoginController::class, 'authenticate']);
Route::get('/c/register', [RegisterController::class, 'index']);
Route::post('/c/logout', [LoginController::class, 'logout']);
Route::resource('/c/variabel', VariabelController::class)->middleware('super');
