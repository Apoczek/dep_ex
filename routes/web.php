<?php

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;

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

Route::get('/users/{user}/posts/{post:slug}', 'App\Http\Controllers\PostController@show');

Route::get('/example', function() {
   $string = '    Hello from our web.php    ';

   $newString = Str::of($string)
       ->trim()
       ->replaceLast('php' ,'jpg');

   dd($newString);
});
