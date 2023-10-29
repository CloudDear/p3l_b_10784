<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\SMController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\RedirectController;

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

Route::group(['middleware' => 'guest'], function () {
    Route::get('/', [AuthController::class, 'login'])->name('login');
    Route::post('/', [AuthController::class, 'dologin']);

});

Route::group(['middleware' => ['auth', 'checkrole:1,2']], function () {
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::get('/redirect', [RedirectController::class, 'cek']);
});

// untuk admin
Route::group(['middleware' => ['auth', 'checkrole:1']], function () {
    Route::get('/admin', [AdminController::class, 'index']);
});

// untuk sm
Route::group(['middleware' => ['auth', 'checkrole:2']], function () {
    Route::get('/sm', [SMController::class, 'index']);
});

Route::get('/dashboard', function () {
    return view('dashboard');
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

Route::get('/login', [AuthController::class, 'login']);
// Route::get('/registration', [RegistrationController::class, 'index']);

//Route Resource
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

Route::resource(
    '/kamar',
    \App\Http\Controllers\KamarController::class
);

Route::resource(
    '/customer',
    \App\Http\Controllers\CustomerController::class
);