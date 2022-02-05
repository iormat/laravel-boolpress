<?php

use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

// Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');


Route::get('/', 'GuestController@index') -> name('index');
Route::post('/login', 'Auth\LoginController@login') -> name('login');
Route::post('/register', 'Auth\RegisterController@register') -> name('register');

Route::get('/auth/posts', 'GuestController@posts') -> name('posts');

Route::get('/logout', 'Auth\LoginController@logout') -> name('logout');
