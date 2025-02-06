<?php

use App\Http\Controllers\UserRegisterController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    if (isset(Auth::user()->role)) {
        if (Auth::user()->role == 'admin') {
            return redirect()->route('admin.dashboard');
        } else {
            return redirect()->route('user.dashboard');
        }
    }
    return redirect('/login');
});

Route::get('/home', function () {
    if (isset(Auth::user()->role)) {
        if (Auth::user()->role == 'admin') {
            return redirect()->route('admin.dashboard');
        } else {
            return redirect()->route('user.dashboard');
        }
    }
    return redirect('/login');
});

Auth::routes();
Route::post('/register', [UserRegisterController::class, 'store'])->name('user.register');


Route::prefix('admin')->middleware('role:admin')->group(function () {
    Route::get('/', function () {
        return redirect()->route('admin.dashboard');
    });
    Route::get('/dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('admin.dashboard');

    Route::prefix('master')->group(function () {
        Route::prefix('anggota')->controller(App\Http\Controllers\Admin\AnggotaController::class)->group(function () {
            Route::get('/', 'index')->name('admin.anggota');
            Route::post('/', 'store')->name('admin.store_anggota');
            Route::post('/{id}', 'update')->name('admin.update_anggota');
            Route::delete('/{id}', 'destroy')->name('admin.destroy_anggota');
        });

        Route::prefix('penerbit')->controller(App\Http\Controllers\Admin\PenerbitController::class)->group(function () {
            Route::get('/', 'index')->name('admin.penerbit');
            Route::post('/', 'store')->name('admin.store_penerbit');
            Route::post('/{id}', 'update')->name('admin.update_penerbit');
            Route::delete('/{id}', 'destroy')->name('admin.destroy_penerbit');
        });

        Route::prefix('administrator')->controller(App\Http\Controllers\Admin\AdministratorController::class)->group(function () {
            Route::get('/', 'index')->name('admin.administrator');
            Route::post('/', 'store')->name('admin.store_administrator');
            Route::post('/{id}', 'update')->name('admin.update_administrator');
            Route::delete('/{id}', 'destroy')->name('admin.destroy_administrator');
        });

        Route::prefix('peminjaman')->controller(App\Http\Controllers\Admin\PeminjamanController::class)->group(function () {
            Route::get('/', 'index')->name('admin.peminjaman');
        });
    });

    Route::prefix('katalog')->group(function () {
        Route::prefix('buku')->controller(App\Http\Controllers\Admin\BukuController::class)->group(function () {
            Route::get('/', 'index')->name('admin.buku');
            Route::post('/', 'store')->name('admin.store_buku');
            Route::post('/{id}', 'update')->name('admin.update_buku');
            Route::delete('/{id}', 'destroy')->name('admin.destroy_buku');
        });

        Route::prefix('kategori')->controller(App\Http\Controllers\Admin\KategoriController::class)->group(function () {
            Route::get('/', 'index')->name('admin.kategori');
            Route::post('/', 'store')->name('admin.store_kategori');
            Route::post('/{id}', 'update')->name('admin.update_kategori');
            Route::delete('/{id}', 'destroy')->name('admin.destroy_kategori');
        });
    });

    Route::prefix('laporan')->controller(App\Http\Controllers\Admin\LaporanController::class)->group(function () {
        Route::get('/', 'index')->name('admin.laporan');
        Route::post('/tgl_peminjaman', 'tgl_peminjaman')->name('admin.laporan_tglpeminjaman');
        Route::post('/tgl_pengembalian', 'tgl_pengembalian')->name('admin.laporan_tglpengembalian');
        Route::post('/anggota', 'anggota')->name('admin.laporan_anggota');
        Route::post('/excel', 'excel')->name('admin.laporan_excel');
    });

    Route::prefix('identitas')->controller(App\Http\Controllers\Admin\IdentitasController::class)->group(function () {
        Route::get('/', 'index')->name('admin.identitas');
        Route::put('/', 'update')->name('admin.update_identitas');
    });
});

Route::prefix('user')->middleware('role:user')->group(function () {
    Route::get('/', function () {
        return redirect()->route('user.dashboard');
    });
    Route::get('/dashboard', [App\Http\Controllers\User\DashboardController::class, 'index'])->name('user.dashboard');

    Route::prefix('peminjaman')->controller(App\Http\Controllers\User\PeminjamanController::class)->group(function () {
        Route::get('/', 'index')->name('user.peminjaman');
        Route::post('/', 'store')->name('user.store_peminjaman');
    });

    Route::prefix('profile')->controller(App\Http\Controllers\User\ProfileController::class)->group(function () {
        Route::get('/', 'index')->name('user.profile');
        Route::put('/', 'update')->name('user.update_profile');
    });

    Route::prefix('info')->controller(App\Http\Controllers\User\InfoController::class)->group(function () {
        Route::get('/', 'index')->name('user.info');
    });
});
