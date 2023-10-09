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
    Route::get('/dashboardAdmin/countFile/{id}', [AdminController::class, 'countFile'])->name('countFile');
    Route::resource('/inputUser', UserController::class);
    Route::get('/kategori/{id}', [AdminController::class, 'dataKategori'])->name('kategori');
    Route::resource('/inputKategori', KategoriController::class);
    Route::get('/inputFile/{id}', [FileController::class, 'index'])->name('inputFile.index');
    Route::delete('/inputFile/{id}', [FileController::class, 'destroy'])->name('inputFile.destroy');
    Route::post('/inputFile/{id}', [FileController::class, 'store'])->name('inputFile.store');
    Route::post('/inputUser/data', [UserController::class, 'data'])->name('dataAdmin');
    Route::post('/inputFile/{id}/data', [FileController::class, 'data'])->name('dataFile');
    Route::post('/dashboardAdmin/data', [FileController::class, 'dataAll'])->name('dataFile.all');
    Route::post('/inputKategori/data', [KategoriController::class, 'data'])->name('dataKategori');
    Route::get('/dashboardAdmin/{id}', [FileController::class, 'download'])->name('file.download');
    Route::get('/inputKategori/loadNavbar', [KategoriController::class, 'loadNavbar'])->name('loadNavbar');
});

Route::middleware(['redirectIfUser'])->group(function () {
    Route::get('/dashboardUser', [AdminController::class, 'index'])->name('dashboardAdmin2');
    Route::get('/dashboardUser/countFile/{id}', [AdminController::class, 'countFile'])->name('countFile2');
    // Route::resource('/inputUser', UserController::class);
    Route::get('/kategoriUser/{id}', [AdminController::class, 'dataKategori'])->name('kategori2');
    // Route::resource('/inputKategori', KategoriController::class);
    Route::get('/inputFileUser/{id}', [FileController::class, 'index'])->name('inputFile.index2');
    Route::delete('/inputFileUser/{id}', [FileController::class, 'destroy'])->name('inputFile.destroy2');
    Route::post('/inputFileUser/{id}', [FileController::class, 'store'])->name('inputFile.store2');
    Route::post('/inputUserUser/data', [UserController::class, 'data'])->name('dataAdmin2');
    Route::post('/inputFileUser/{id}/data', [FileController::class, 'data'])->name('dataFile2');
    Route::post('/dashboardUser/data', [FileController::class, 'dataAll'])->name('dataFile.all2');
    Route::post('/inputKategoriUser/data', [KategoriController::class, 'data'])->name('dataKategori2');
    Route::get('/dashboardUser/{id}', [FileController::class, 'download'])->name('file.download2');
    Route::get('/inputKategoriUser/loadNavbar', [KategoriController::class, 'loadNavbar'])->name('loadNavbar2');
});


// Route::get('/dashboardUser', [UserController::class, 'index']);
