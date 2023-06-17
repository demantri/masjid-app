<?php

use App\Http\Controllers\ArusKas\KasKeluar;
use App\Http\Controllers\ArusKas\KasMasuk;
use App\Http\Controllers\Dashboard;
use App\Http\Controllers\Laporan\KasMasuk as LaporanKasMasuk;
use App\Http\Controllers\Masterdata\COA;
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

// Route::get('/', function () {
//     return view('template.app');
// });

Route::get('/dashboard', [Dashboard::class, 'index']);

Route::prefix('masterdata')->group(function () {
    Route::get('coa', [COA::class, 'index']);
    Route::post('coa/store', [COA::class, 'store']);
});

Route::prefix('keuangan')->group(function () {
    Route::prefix('kas-masuk')->group(function () {
        Route::get('/', [KasMasuk::class, 'index']);
        Route::post('store', [KasMasuk::class, 'store']);
    });

    Route::prefix('kas-keluar')->group(function () {
        Route::get('/', [KasKeluar::class, 'index']);
        Route::post('store', [KasKeluar::class, 'store']);
    });
});

Route::prefix('laporan')->group(function () {
    Route::prefix('kas-masuk')->group(function () {
        Route::get('/', [LaporanKasMasuk::class, 'index']);
        Route::post('filter', [LaporanKasMasuk::class, 'getList']);
    });

    Route::prefix('kas-keluar')->group(function () {
        Route::get('/', []);
    });

    Route::prefix('jurnal-umum')->group(function () {
        Route::get('/', []);
    });

    Route::prefix('bukubesar')->group(function () {
        Route::get('/', []);
    });
});