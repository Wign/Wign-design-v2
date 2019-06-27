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
Route::get('/login', function () { return view('pages.login'); })->name('login');
Route::get('/sign/Hjerte', function () { return view('pages.sign'); });
Route::get('/styleGuide', function () { return view('pages.styles'); });

Route::middleware(['auth'])->group(function () {

    Route::name('word.')->group(function () {
        Route::get( '/ask',  'WordController@getRequests')->name('requests');
    });
    // WORD

});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
