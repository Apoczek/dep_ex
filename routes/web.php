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

Route::view('/', 'welcome');
//Route::view('/example', 'example');

Route::get('/example', function() {
    return view('example', [
        'info' => 'Very cool information'
    ]);
});
//Route::get('')