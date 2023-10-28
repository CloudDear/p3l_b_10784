<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;

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

Route::get('/login', [LoginController::class, 'index']);

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