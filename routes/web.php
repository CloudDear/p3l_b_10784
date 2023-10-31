<?php

use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\RedirectController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\SMController;

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
// Route::get('/login', [AuthController::class, 'login']);
Route::group(['middleware' => 'guest'], function () {
    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/login', [AuthController::class, 'dologin']);
    Route::resource(
        '/customer',
        \App\Http\Controllers\CustomerController::class
    );

});

Route::group(['middleware' => ['auth', 'checkrole:1,2']], function () {
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::get('/redirect', [RedirectController::class, 'cek']);
});

// untuk admin
Route::group(['middleware' => ['auth', 'checkrole:1']], function () {
    Route::get('/admin', [AdminController::class, 'index']);
    Route::resource(
        '/kamar',
        \App\Http\Controllers\KamarController::class
    );
});

// untuk sm
Route::group(['middleware' => ['auth', 'checkrole:2']], function () {
    Route::get('/sm', [SMController::class, 'index']);

    Route::resource(
        '/tarif',
        \App\Http\Controllers\TarifController::class
    );
    Route::resource(
        '/season',
        \App\Http\Controllers\SeasonController::class
    );
    Route::resource(
        '/layanan_kamar',
        \App\Http\Controllers\LayananKamarController::class
    );
});

Route::get('/dashboard', function () {
    return view('layouts.dashboard');
});


Route::get('/', function () {
    return view('home', [
        "title" => "Home"
    ]);
});

Route::get('/about', function () {
    return view('about', [
        "title" => "About"
    ]);
});

Route::get('/posts', function () {
    return view('posts', [
        "title" => "Posts"
    ]);
});