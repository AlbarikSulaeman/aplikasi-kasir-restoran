<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\PdfController;

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

Route::get('logout', [LoginController::class, 'logout']);
Route::get('login', [LoginController::class, 'index']);
Route::post('login', [LoginController::class, 'authanticate']);


Route::get('register', [RegisterController::class, 'index']);
Route::get('register/create', [RegisterController::class, 'create']);
Route::post('register/create', [RegisterController::class, 'store']);
Route::get('register/edit/{id}', [RegisterController::class, 'edit']);
Route::post('register/edit/{id}', [RegisterController::class, 'update']);
Route::delete('register/delete/{id}', [RegisterController::class, 'destroy']);

Route::resource('menu', MenuController::class);
Route::resource('transaksi', TransaksiController::class);
Route::get('laporan', [TransaksiController::class, 'show']);
Route::get('/pdf', [PdfController::class, 'print']);



