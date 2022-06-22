<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KriteriaController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\UserController;
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

Route::get('/', function () {
    return redirect()->route('login');
});

Route::get('login', [AuthController::class, 'login'])->name('login');
Route::post('proses_login', [AuthController::class, 'proses_login'])->name('proses_login');
Route::get('logout', [AuthController::class, 'logout'])->name('logout');

Route::group(['middleware' => ['auth']], function ()
{
    Route::group(['middleware' => ['cek_login:admin']], function ()
    {
        Route::resource('home', HomeController::class);
        Route::resource('user', UserController::class);
        Route::resource('supplier', SupplierController::class);
        Route::resource('kriteria', KriteriaController::class);
    });
    Route::group(['middleware' => ['cek_login:pimpinan']], function ()
    {
        Route::resource('pimpinan', HomeController::class);
    });
});
