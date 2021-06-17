<?php

use Illuminate\Support\Facades\Http;
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

Route::get('/example', function() {
   $response = Http::retry(2, 500)->post('https://jsonplaceholder.typicode.com/posts', [
       'userId' => 11
   ]);

   dd($response->headers());
});
