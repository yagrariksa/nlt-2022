<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PesertaController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\SouvenirController;
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
    // return view('coming-soon');
    if (Auth::user()) {
        // return view('be.d.landing');
        return view('container.dashboard-client');
    }
    // return view('be.landing');
    return view('container.home');
})->name('home');

Route::get('test', function () {
    return view('test');
});

Route::middleware('guest')->group(function () {
    Route::name('register')->prefix('registrasi')->group(function () {
        Route::get('/', [AuthController::class, 'view_regist']);
        Route::post('/', [AuthController::class, 'action_regist']);
    });
    Route::name('login')->prefix('login')->group(function () {
        Route::get('/', [AuthController::class, 'view_login']);
        Route::post('/', [AuthController::class, 'action_login']);
    });
    Route::name('forgot-password')->prefix('forgot-password')->group(function(){
        Route::get('/', [AuthController::class, 'view_forgot_password']);
        Route::post('/', [AuthController::class, 'action_forgot_password']);
    });
});

Route::middleware('auth')->group(function () {
    Route::get('logout', function () {
        Auth::logout();
        return redirect()->route('home');
    })->name('logout');
    Route::name('peserta')->prefix('peserta')->group(function () {
        /**
         * view dashboard list / form add-peserta / form edit-peserta
         * form add-travel / edit-travel
         * gunakan URL-params [Mode=edit/add,Object=peserta/travel,uid=uid?]
         */
        Route::get('/', [PesertaController::class, 'd_view']);

        // response from dashboard to dashboard
        // gunakan URL-params [Mode=edit/add,Object=peserta/travel,uid=uid?]
        Route::post('/', [PesertaController::class, 'd_action']);
        Route::delete('/', [PesertaController::class, 'd_action']);
    });
    Route::name('souvenir')->prefix('souvenir')->group(function(){
        Route::get('/', [SouvenirController::class, 'd_view']);
        Route::post('/', [SouvenirController::class, 'd_action']);
        Route::delete('/', [SouvenirController::class, 'd_action']);
    });
    Route::get('absensi', function(){
        return view('container.list-absensi');
    })->name('absensi');

    Route::name('akun.setting')->prefix('setting')->group(function () {
        // view account settings
        Route::get('/', [AuthController::class, 'view_acc_setting']); // show view settings

        // response account settings
        Route::post('/', [AuthController::class, 'action_acc_setting']); // give response by submission
    });

    // TODO : SOUVENIR dashboard-page
});

Route::name('a.')->prefix('mahavira')->group(function () {
    Route::name('login')->prefix('login')->group(function () {
        Route::get('/', [AuthController::class, 'mahavira_view_login']);
        Route::post('/', [AuthController::class, 'mahavira_action_login']);
    });
    Route::middleware('admin')->group(function(){
        Route::get('/', [AdminController::class, 'a_view'])->name('peserta');
        Route::get('logout', [AuthController::class, 'mahavira_action_logout'])->name('logout');
    });
});
