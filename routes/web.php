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

// Authencation routes
Auth::routes();

// Home routes 
Route::get('/', 'Frontend\IndexController@index')->name('frontend.home');
Route::get('/home', 'HomeController@index')->name('home');

// Policy Routes
Route::get('/disclaimer', 'Frontend\PolicyController@disclaimer')->name('policy.disclaimer');
