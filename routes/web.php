<?php

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
    return view('welcome');
});


Route::group(['middleware' => 'auth'], function () {
    Route::middleware(['role:user'])->group(function () {
        Route::get('/home', function () {
            return view('home');
        });
    });

    Route::middleware(['role:admin'])->group(function () {
        Route::get('/admin', function () {
            return view('home');
        });
    });
});
