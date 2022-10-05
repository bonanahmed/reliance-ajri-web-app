<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\NewsController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('c/', function () {
    return view('cms.login');
});

Route::get('/c/dashboard', [DashboardController::class, 'index'])->middleware('auth');
Route::get('/c/news', [NewsController::class, 'index'])->middleware('auth');

Route::get('/c/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/c/login', [LoginController::class, 'authenticate']);
Route::get('/c/register', [RegisterController::class, 'index']);
Route::post('/c/logout', [LoginController::class, 'logout']);

Route::resource('/c/news', NewsController::class)->middleware('auth');
