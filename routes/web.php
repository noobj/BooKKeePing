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

Route::get('/', function () {
    return view('welcome');
});

/*Route::get('about', 'PagesController@about');
Route::get('dummies', 'DummiesController@index');
Route::get('dummies/create', 'DummiesController@create');
Route::get('dummies/{id}', 'DummiesController@show');
Route::post('dummies', 'DummiesController@store');*/

Route::resource('dummies', 'DummiesController');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
