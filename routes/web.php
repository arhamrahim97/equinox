<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ListController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MouController;
use App\Http\Controllers\LocalizationController;
use App\Http\Controllers\master\AkunController;
use App\Http\Controllers\master\FakultasController;
use App\Http\Controllers\master\NegaraController;
use App\Http\Controllers\master\PengusulController;
use App\Http\Controllers\master\ProdiController;
use App\Http\Controllers\ProfilController;

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



Route::middleware(['auth'])->group(function () {
    Route::resource('/mou', MouController::class);
    Route::resource('/negara', NegaraController::class);
    Route::resource('/fakultas', FakultasController::class)->parameters([
        'fakultas' => 'fakultas'
    ]);
    Route::resource('/prodi/{fakultas}', ProdiController::class)->parameters([
        '{fakultas}' => 'prodi',
    ]);
    Route::resource('/akun', AkunController::class)->parameters([
        'akun' => 'user'
    ]);

    Route::resource('/pengusul', PengusulController::class)->parameters([
        'pengusul' => 'pengusul'
    ]);

    Route::get('/', function () {
        return view('pages.dashboard.starterTemplate');
    });

    Route::get('/profil', [ProfilController::class, 'index']);
    Route::put('/profil/{user}', [ProfilController::class, 'updateProfil']);
});


Route::get('/listFakultas', [ListController::class, 'listFakultas']);
Route::get('/listProdi', [ListController::class, 'listProdi']);

Route::get('/login', [AuthController::class, 'index'])->name('login');
Route::get('/logout', [AuthController::class, 'index'])->name('logout');
Route::post('/cekLogin', [AuthController::class, 'cekLogin']);

Route::get('lang/{locale}', [App\Http\Controllers\LocalizationController::class, 'index']);
// Route::get('lang/{locale}', [App\Http\Controllers\LocalizationController::class, 'create']);
