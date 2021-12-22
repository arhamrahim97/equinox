<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IaController;
use App\Http\Controllers\MoaController;
use App\Http\Controllers\MouController;
use App\Http\Controllers\LocalizationController;

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
    return view('pages.dashboard.starterTemplate');
});

Route::resource('/mou', MouController::class);
Route::resource('/moa', MoaController::class);
Route::resource('/ia', IaController::class);

Route::get('lang/{locale}', [App\Http\Controllers\LocalizationController::class, 'index']);
// Route::get('lang/{locale}', [App\Http\Controllers\LocalizationController::class, 'create']);