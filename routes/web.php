<?php

use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

// Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');


Route::get('/', 'GuestController@index') -> name('index');
Route::post('/login', 'Auth\LoginController@login') -> name('login');
