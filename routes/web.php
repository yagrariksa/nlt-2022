<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PesertaController;
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
    // return view('welcome');
    return view('coming-soon');
});

Route::middleware('guest')->group(function () {
    Route::name('register')->prefix('regist')->group(function () {
        Route::get('/', [AuthController::class, 'regist_view']);
        Route::post('/', [AuthController::class, 'regist_action']);
    });
    Route::name('login')->prefix('login')->group(function () {
        Route::get('/', [AuthController::class, 'login_view']);
        Route::post('/', [AuthController::class, 'login_action']);
    });
});


Route::name('d.')->prefix('d')->middleware('auth')->group(function () {

    Route::any('/', function () {
        // selalu redirect ke route list-peserta
        return redirect()->route('d.peserta.list');
    });

    Route::name('peserta')->prefix('/peserta')->group(function () {
        /**
         * view dashboard list / form add-peserta / form edit-peserta
         * form add-travel / edit-travel
         * gunakan URL-params [Mode=edit/add,Object=peserta/travel,uid=uid?]
         */
        Route::get('/', [PesertaController::class, 'd_view']);

        // response from dashboard to dashboard
        // gunakan URL-params [Mode=edit/add,Object=peserta/travel,uid=uid?]
        Route::post('/', [PesertaController::class, 'd_action']);
    });

    Route::name('akun.setting')->prefix('setting')->group(function () {
        // view account settings
        Route::get('/', [AuthController::class, 'acc_setting_view']); // show view settings

        // response account settings
        Route::post('/', [AuthController::class, 'acc_setting_action']); // give response by submission
    });

    // TODO : SOUVENIR dashboard-page
});
