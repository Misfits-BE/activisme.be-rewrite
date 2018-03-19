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
Route::get('/home', 'Backend\IndexController@index')->name('home');

// Policy Routes
Route::get('/disclaimer', 'Frontend\PolicyController@disclaimer')->name('policy.disclaimer');

// Backend category routes 
Route::get('/admin/categorieen', 'Backend\CategoriesController@index')->name('admin.categories.index');
Route::get('/admin/categorieen/nieuw', 'Backend\CategoriesController@create')->name('admin.categories.create');
Route::post('/admin/categorieen/nieuw', 'Backend\CategoriesController@store')->name('admin.categories.store');
Route::get('/admin/categorieen/wijzig/{id}', 'Backend\CategoriesController@edit')->name('admin.categories.edit');
Route::patch('/admin/categorieen/wijzig/{id}', 'Backend\CategoriesController@update')->name('admin.categories.update');
Route::get('/admin/categorieen/verwijder/{id}', 'Backend\CategoriesController@destroy')->name('admin.categories.delete');
