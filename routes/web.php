<?php

use App\Models\Ia;
use UniSharp\LaravelFilemanager\Lfm;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IaController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\MoaController;
use App\Http\Controllers\MouController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ListController;
use App\Http\Controllers\MapIaController;
use App\Http\Controllers\MapMoaController;
use App\Http\Controllers\MapMouController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\master\AkunController;
use App\Http\Controllers\master\KotaController;
use App\Http\Controllers\LocalizationController;
use App\Http\Controllers\master\ProdiController;
use App\Http\Controllers\RekapitulasiController;
use App\Http\Controllers\master\NegaraController;
use App\Http\Controllers\master\FakultasController;
use App\Http\Controllers\master\PengusulController;
use App\Http\Controllers\master\ProvinsiController;
use App\Http\Controllers\master\KecamatanController;
use App\Http\Controllers\master\KelurahanController;
use App\Http\Controllers\berita\KelolaBeritaController;
use App\Http\Controllers\berita\KategoriBeritaController;
use App\Http\Controllers\BorangIaController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\master\SliderController;
use App\Http\Controllers\master\TentangController;



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
    Route::get('/dashboard', [DashboardController::class, 'index']);
    Route::get('/getTotalNegaraMou', [DashboardController::class, 'getTotalNegaraMou']);
    Route::get('/getTotalNegaraMoa', [DashboardController::class, 'getTotalNegaraMoa']);
    Route::get('/getTotalNegaraIa', [DashboardController::class, 'getTotalNegaraIa']);

    Route::resource('/mou', MouController::class)->parameters([
        'mou' => 'mou'
    ]);
    Route::resource('/moa', MoaController::class)->parameters([
        'moa' => 'moa'
    ]);
    Route::resource('/ia', IaController::class)->parameters([
        'ia' => 'ia'
    ]);
    Route::post('/ia/upload_tambahan/{ia}', [IaController::class, 'uploadTambahan']);


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


    Route::get('/pohon-kerja-sama/mou', MouController::class . '@pohonMou');
    Route::get('/pohon-kerja-sama/mou/moa/{mou}', MouController::class . '@daftarMoa');
    Route::get('/pohon-kerja-sama/mou/ia/{mou}', MouController::class . '@daftarIa');
    Route::get('/pohon-kerja-sama/mou/moa/ia/{moa}', MouController::class . '@daftarMoaIa');


    Route::get('/pohon-kerja-sama/moa', MoaController::class . '@pohonMoa');
    Route::get('/pohon-kerja-sama/moa/ia/{moa}', MoaController::class . '@daftarIa');



    Route::resource('/rekapitulasi', RekapitulasiController::class);
    Route::get('/rekapitulasiresult', [RekapitulasiController::class, 'datatables']);
    Route::get('/getfilter', [ListController::class, 'getFilter']);


    Route::get('/', function () {
        return view('pages.dashboard.starterTemplate');
    });

    Route::resource('/kelolaTentang', TentangController::class)->parameters([
        'kelolaTentang' => 'tentang'
    ]);

    Route::resource('/slider', SliderController::class)->parameters([
        'slider' => 'slider'
    ]);

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

    Route::get('/getProdi', [ListController::class, 'getProdi']);
    Route::get('/getProdiEdit', [ListController::class, 'getProdiEdit']);

    Route::get('/borangIa', [BorangIaController::class, 'index']);
    Route::post('/exportBorangIa', [BorangIaController::class, 'export']);
});

// Landing

Route::get('/', [LandingController::class, 'index']);
Route::get('/berita/{berita:slug}', [LandingController::class, 'berita']);
Route::get('/daftarBerita', [LandingController::class, 'daftarBerita']);
Route::get('/daftarMou', [LandingController::class, 'daftarMou']);
Route::get('/daftarMoa', [LandingController::class, 'daftarMoa']);
Route::get('/daftarIa', [LandingController::class, 'daftarIa']);
Route::get('/tentang', [LandingController::class, 'tentang']);
Route::get('/detailIa', [LandingController::class, 'detailIa']);
Route::post('dataIa', [LandingController::class, 'dataIa']);

Route::get('/listNegaraTersedia', [LandingController::class, 'listNegaraTersedia']);

Route::post('/getMarkerMapMou', [LandingController::class, 'getMapDataMou']);
Route::post('/getMarkerMapMoa', [LandingController::class, 'getMapDataMoa']);
Route::post('/getMarkerMapIa', [LandingController::class, 'getMapDataIa']);

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

Route::get('/getEditJenisKerjasama', [IaController::class, 'getEditJenisKerjasama']);
