<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\FileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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
Route::get('/', [HomeController::class, 'index']);
Route::get('/home', [HomeController::class, 'landing']);
Route::get('/logout', [LoginController::class, 'logout']);
Auth::routes();

Route::middleware(['redirectIfAdmin'])->group(function () {
    Route::get('/dashboardAdmin', [AdminController::class, 'index'])->name('dashboardAdmin');
    Route::resource('/inputUser', UserController::class);
    Route::resource('/inputKategori', KategoriController::class);
    Route::get('/inputFile/{id}', [FileController::class, 'index'])->name('inputFile.index');
    Route::delete('/inputFile/{id}', [FileController::class, 'destroy'])->name('inputFile.destroy');
    Route::post('/inputFile/{id}', [FileController::class, 'store'])->name('inputFile.store');
    Route::post('/inputUser/data', [UserController::class, 'data'])->name('dataAdmin');
    Route::post('/inputFile/{id}/data', [FileController::class, 'data'])->name('dataFile');
    Route::post('/inputKategori/data', [KategoriController::class, 'data'])->name('dataKategori');
});


Route::get('/dashboardUser', [UserController::class, 'index']);
