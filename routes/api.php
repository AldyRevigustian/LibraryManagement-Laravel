<?php

use App\Http\Controllers\API\AuthController;
use Illuminate\Support\Facades\Route;

Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register']);

Route::group(['middleware' => ['auth:sanctum', 'role:admin'], 'prefix' => 'admin'], function () {
    Route::prefix('anggota')->controller(App\Http\Controllers\API\admin\AnggotaController::class)->group(function () {
        Route::get('/', 'index');
        Route::post('/', 'store');
        Route::post('/{id}', 'update');
        Route::delete('/{id}', 'destroy');
    });

    Route::prefix('penerbit')->controller(App\Http\Controllers\API\admin\PenerbitController::class)->group(function () {
        Route::get('/',    'index');
        Route::post('/',    'store');
        Route::post('/{id}',    'update');
        Route::delete('/{id}',    'destroy');
    });

    Route::prefix('kategori')->controller(App\Http\Controllers\API\admin\KategoriController::class)->group(function () {
        Route::get('/', 'index');
        Route::post('/', 'store');
        Route::post('/{id}', 'update');
        Route::delete('/{id}', 'destroy');
    });

    Route::prefix('administrator')->controller(App\Http\Controllers\API\admin\AdministratorController::class)->group(function () {
        Route::get('/', 'index');
        Route::post('/', 'store');
        Route::post('/{id}', 'update');
        Route::delete('/{id}', 'destroy');
    });

    Route::prefix('buku')->controller(App\Http\Controllers\API\admin\BukuController::class)->group(function () {
        Route::get('/', 'index');
        Route::post('/', 'store');
        Route::post('/{id}', 'update');
        Route::delete('/{id}', 'destroy');
    });

    Route::prefix('peminjaman')->controller(App\Http\Controllers\API\admin\PeminjamanController::class)->group(function () {
        Route::get('/', 'index');
    });

    Route::prefix('laporan')->controller(App\Http\Controllers\API\admin\LaporanController::class)->group(function () {
        Route::post('/peminjaman', 'peminjaman');
        Route::post('/pengembalian', 'pengembalian');
        Route::post('/anggota', 'anggota');
    });

    Route::prefix('identitas')->controller(App\Http\Controllers\API\admin\IdentitasController::class)->group(function () {
        Route::get('/', 'index');
        Route::post('/', 'update');
    });

});

Route::group(['middleware' => ['auth:sanctum', 'role:user'], 'prefix' => 'user'], function () {
    Route::prefix('peminjaman')->controller(App\Http\Controllers\API\user\PeminjamanController::class)->group(function () {
        Route::get('/', 'index');
        Route::post('/', 'store');
    });

    Route::prefix('pengembalian')->controller(App\Http\Controllers\API\user\PengembalianController::class)->group(function () {
        Route::get('/', 'index');
        Route::post('/', 'store');
    });


    Route::prefix('profile')->controller(App\Http\Controllers\API\user\ProfileController::class)->group(function () {
        Route::get('/', 'index');
        Route::post('/', 'update');
    });
});
