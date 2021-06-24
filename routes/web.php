<?php

use App\Casts\UserCode;
use App\Models\Post;
use App\Models\User;
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

Route::view('/', 'home');

Route::view('contact', 'contact');
Route::view('about', 'about');

Route::get('customers', 'App\Http\Controllers\CustomerController@list');
Route::post('customers', 'App\Http\Controllers\CustomerController@store');


Route::get('/users/{user}/posts/{post:slug}', 'App\Http\Controllers\PostController@show');
Route::get('query-casts', function() {
    $users = User::select([
        'users.*',
        'last_posted_at' => Post::selectRaw('MAX(created_at)')
        ->whereColumn('user_id', 'users.id')
    ])
        ->withCasts([
            'last_posted_at' => UserCode::class
        ])
        ->get();

    dd($users->first()->last_posted_at);
});
Route::get('/example', function() {
   $string = '    Hello from our web.php    ';

   $newString = Str::of($string)
       ->trim()
       ->replaceLast('php' ,'jpg');

   dd($newString);
});
Route::get('/email', function() {
    return new \App\Mail\UserRegisteredMail();
});
Route::get('profile/{profile}', 'App\Http\Controllers\ProfileController@show');
Route::get('posts/{post}-{slug}', 'App\Http\Controllers\PostController@show');
