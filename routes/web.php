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

Route::get('contact', 'App\Http\Controllers\ContactFormController@create')->name('contact.create');
Route::post('contact', 'App\Http\Controllers\ContactFormController@store')->name('contact.store');

Route::view('about', 'about')->middleware('test');

//Route::get('customers', 'App\Http\Controllers\CustomerController@index');
//Route::get('customers/create', 'App\Http\Controllers\CustomerController@create');
//Route::post('customers', 'App\Http\Controllers\CustomerController@store');
//Route::get('customers/{customer}', 'App\Http\Controllers\CustomerController@show');
//Route::get('customers/{customer}/edit', 'App\Http\Controllers\CustomerController@edit');
//Route::patch('customers/{customer}', 'App\Http\Controllers\CustomerController@update');
//Route::delete('customers/{customer}', 'App\Http\Controllers\CustomerController@destroy');

Route::resource('customers', 'App\Http\Controllers\CustomerController');


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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
