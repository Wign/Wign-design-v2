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

Route::get('/', function () { return view('pages.home'); })->name('index');
//Route::get('/new', function () { return view(''); })->name('createSign');
//Route::get('/ask', function () { return view('layouts.index'); })->name('seeRequest');
//Route::get('/signs', function () { return view('layouts.index'); })->name('seeRecent');
Route::get('/about', function () { return view('pages.about'); })->name('about');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
