<?php

use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\DashboardController;
use App\Http\Controllers\API\GetDataController;
use App\Http\Controllers\API\IaController;
use App\Http\Controllers\API\LandingController;
use App\Http\Controllers\API\ListController;
use App\Http\Controllers\API\Master\PengusulController;
use App\Http\Controllers\API\MoaController;
use App\Http\Controllers\API\MouController;
use App\Http\Controllers\API\ProfilController;
use App\Http\Controllers\API\TotalDataController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/listMou', [LandingController::class, 'listMou']);
Route::get('/listMoa', [LandingController::class, 'listMoa']);
Route::get('/listIa', [LandingController::class, 'listIa']);
Route::get('/listSlider', [LandingController::class, 'listSlider']);
Route::get('/listBeritaLanding', [LandingController::class, 'listBeritaLanding']);
Route::get('/totalSemuaDokumen', [LandingController::class, 'totalSemuaDokumen']);
Route::get('/getMapDataMou', [LandingController::class, 'getMapDataMou']);
Route::get('/getMapDataMoa', [LandingController::class, 'getMapDataMoa']);
Route::get('/getMapDataIa', [LandingController::class, 'getMapDataIa']);
Route::get('/daftarBerita', [LandingController::class, 'daftarBerita']);
Route::get('/detailBerita/{berita:slug}', [LandingController::class, 'detailBerita']);

// Auth
Route::post('login', [AuthController::class, 'login']);
Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::get('logout', [AuthController::class, 'logout']);

    Route::get('profil', [ProfilController::class, 'profil']);
    Route::post('updateProfil', [ProfilController::class, 'updateProfil']);
    Route::get('/getDataPengusul/{pengusul:id}', [GetDataController::class, 'pengusul']);

    Route::resource('moa', MoaController::class);
    Route::resource('mou', MouController::class);
    Route::resource('ia', IaController::class);

    Route::post('uploadSuratTugas', [IaController::class, 'uploadSuratTugas']);
    Route::post('uploadLaporanPelaksanaan', [IaController::class, 'uploadLaporanPelaksanaan']);

    Route::get('dibuatOlehMou', [MouController::class, 'dibuatOlehMou']);
    Route::resource('pengusul', PengusulController::class);

    Route::get('/listRegion', [ListController::class, 'listRegion']);
    Route::get('/listNegara', [ListController::class, 'listNegara']);
    Route::get('/listProvinsi', [ListController::class, 'listProvinsi']);
    Route::get('/listKota', [ListController::class, 'listKota']);
    Route::get('/listKecamatan', [ListController::class, 'listKecamatan']);
    Route::get('/listKelurahan', [ListController::class, 'listKelurahan']);
    Route::get('/listPengusul', [ListController::class, 'listPengusul']);
    Route::get('/listKategoriBerita', [ListController::class, 'listKategoriBerita']);
    Route::get('/listFakultas', [ListController::class, 'listFakultas']);
    Route::get('/listProdi', [ListController::class, 'listProdi']);
    Route::get('/listJenisKerjasama', [ListController::class, 'listJenisKerjasama']);

    Route::get('/listNegaraMou', [DashboardController::class, 'listNegaraMou']);
    Route::get('/listNegaraMoa', [DashboardController::class, 'listNegaraMoa']);
    Route::get('/listNegaraIa', [DashboardController::class, 'listNegaraIa']);
    Route::get('/totalDataMou', [DashboardController::class, 'totalDataMou']);
    Route::get('/totalDataMoa', [DashboardController::class, 'totalDataMoa']);
    Route::get('/totalDataIa', [DashboardController::class, 'totalDataIa']);
});
