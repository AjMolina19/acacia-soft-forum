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
    return view('comments', [
        'post' => App\Post::latest()->get()
    ]);
});

Route::get('/comments', 'PostController@create');
Route::post('/comments', 'PostController@store');
Route::get('comments/{id}', 'PostController@edit');
Route::post('update/{id}', 'PostController@update');
Route::post('delete/{id}', 'PostController@destroy');


