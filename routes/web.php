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
    return view('pages.home');
})->name('index');

//Route::get('/new', function () { return view(''); })->name('createSign');
//Route::get('/ask', function () { return view('layouts.index'); })->name('seeRequest');
Route::get('/about', function () {
    return view('pages.about');
})->name('about');
Route::get('/signs', function () {
    return view('pages.recent');
})->name('signs');

Route::get('/sign/Hjerte', function () {
    return view('pages.sign');
})->name('sign');
Route::get('/words', 'WordController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
