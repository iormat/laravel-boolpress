<?php

use Illuminate\Support\Facades\Route;

// Auth::routes();

Route::get('/', 'HomeController@index') -> name('index');
Route::post('/login', 'Auth\LoginController@login') -> name('login');
Route::post('/register', 'Auth\RegisterController@register') -> name('register');

Route::middleware('auth') -> prefix('posts') -> group(function(){
    Route::get('/', 'GuestController@posts') -> name('posts');
    Route::get('/create', 'GuestController@create') -> name('create');
    Route::post('/store', 'GuestController@store') -> name('store');
    Route::get('/edit/{id}', 'GuestController@edit') -> name('edit');
    Route::post('/update/{id}', 'GuestController@update') -> name('update');
});

Route::get('/logout', 'Auth\LoginController@logout') -> name('logout');
