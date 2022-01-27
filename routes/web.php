<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PesertaController;
use App\Http\Controllers\SouvenirController;
use Illuminate\Support\Facades\Route;
use PHPUnit\TextUI\XmlConfiguration\Group;

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
    if (Auth::user()) {
        return view('be.d.landing');
    }
    return view('be.landing');
})->name('home');

Route::middleware('guest')->group(function () {
    Route::name('register')->prefix('regist')->group(function () {
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
        Route::get('/', function () {
            return 'login-get';
        });
        Route::post('/', function () {
            return 'login-post';
        });
    });
    Route::get('/', [PesertaController::class, 'a_view'])->name('peserta');
});
