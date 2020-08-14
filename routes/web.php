<?php

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
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

Route::get('/feedback/{idfdb}', 'HomeController@feedback')->name('home.feedback');

Route::post('/post', 'PostController@store')->name('post.store');

Route::post('/post/{id}/comentario', 'PostController@novoComentario')->name('comentario.store');