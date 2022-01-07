<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\berita\KategoriBeritaController;
use App\Http\Controllers\berita\KelolaBeritaController;
use App\Http\Controllers\ListController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IaController;
use App\Http\Controllers\MoaController;
use App\Http\Controllers\MouController;
use App\Http\Controllers\LocalizationController;
use App\Http\Controllers\MapIaController;
use App\Http\Controllers\MapMoaController;
use App\Http\Controllers\MapMouController;
use App\Http\Controllers\master\AkunController;
use App\Http\Controllers\master\FakultasController;
use App\Http\Controllers\master\KecamatanController;
use App\Http\Controllers\master\KelurahanController;
use App\Http\Controllers\master\KotaController;
use App\Http\Controllers\master\NegaraController;
use App\Http\Controllers\master\PengusulController;
use App\Http\Controllers\master\ProdiController;
use App\Http\Controllers\master\ProvinsiController;
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
    Route::resource('/mou', MouController::class)->parameters([
        'mou' => 'mou'
    ]);;
    Route::resource('/moa', MoaController::class);
    Route::resource('/ia', IaController::class);
    Route::resource('/negara', NegaraController::class);
    Route::resource('/provinsi/{negara}', ProvinsiController::class)->parameters([
        '{negara}' => 'provinsi',
    ]);

    Route::resource('/kota/{provinsi}', KotaController::class)->parameters([
        '{provinsi}' => 'kota',
    ]);

    Route::resource('/kecamatan/{kota}', KecamatanController::class)->parameters([
        '{kota}' => 'kecamatan',
    ]);

    Route::resource('/kelurahan/{kecamatan}', KelurahanController::class)->parameters([
        '{kecamatan}' => 'kelurahan',
    ]);

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

    Route::resource('/kategoriBerita', KategoriBeritaController::class)->parameters([
        'kategoriBerita' => 'kategori_berita'
    ]);

    Route::resource('/kelolaBerita', KelolaBeritaController::class)->parameters([
        'kelolaBerita' => 'berita'
    ]);

    Route::get('/', function () {
        return view('pages.dashboard.starterTemplate');
    });

    Route::get('/mapMou', [MapMouController::class, 'index']);
    Route::post('/getDataMapMou', [MapMouController::class, 'getMapDataMou']);
    Route::post('/getDetailMou/{mou}', [MapMouController::class, 'getDetailMou']);

    Route::get('/mapMoa', [MapMoaController::class, 'index']);
    Route::post('/getDataMapMoa', [MapMoaController::class, 'getMapDataMoa']);
    Route::post('/getDetailMoa/{moa}', [MapMoaController::class, 'getDetailMoa']);

    Route::get('/mapIa', [MapIaController::class, 'index']);
    Route::post('/getDataMapIa', [MapIaController::class, 'getMapDataIa']);
    Route::post('/getDetailIa/{ia}', [MapIaController::class, 'getDetailIa']);

    Route::get('/profil', [ProfilController::class, 'index']);
    Route::put('/profil/{user}', [ProfilController::class, 'updateProfil']);
});

Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});


Route::get('/listFakultas', [ListController::class, 'listFakultas']);
Route::get('/listProdi', [ListController::class, 'listProdi']);
Route::get('/listNegara', [ListController::class, 'listNegara']);
Route::get('/listProvinsi', [ListController::class, 'listProvinsi']);
Route::get('/listKota', [ListController::class, 'listKota']);
Route::get('/listKecamatan', [ListController::class, 'listKecamatan']);
Route::get('/listKelurahan', [ListController::class, 'listKelurahan']);

Route::get('/login', [AuthController::class, 'index'])->name('login');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
Route::post('/cekLogin', [AuthController::class, 'cekLogin']);


Route::get('lang/{locale}', [App\Http\Controllers\LocalizationController::class, 'index']);
// Route::get('lang/{locale}', [App\Http\Controllers\LocalizationController::class, 'create']);
