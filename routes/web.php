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

Route::view('/', 'pages.index')->name('index');

//Route::get('/new', function () { return view(''); })->name('createSign');
Route::get('/ask', 'RequestController@index')->name('ask');
Route::view('/about', 'pages.about')->name('about');
Route::view('/signs', 'pages.recent')->name('signs');

Route::view('/sign/Hjerte', 'pages.sign')->name('sign');
Route::get('/words', 'WordController@index');

Auth::routes();
