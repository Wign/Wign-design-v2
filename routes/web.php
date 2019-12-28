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

// INDEX //
Route::get('/', 'IndexController@index')->name('index');
Route::get('about', 'IndexController@about')->name('index.about');
Route::get('policy', 'IndexController@policy')->name('index.policy');
Route::get('contact', 'IndexController@contact')->name('index.contact');
Route::get('cookies', 'IndexController@cookies')->name('index.cookies');
Route::get('profile', 'IndexController@profile')->name('index.profile'); // TODO måske flytte til ProfileController

// TRANSLATION //
Route::get('recent', 'TranslationController@recents')->name('translation.recent');
Route::get('word/{literal}', 'TranslationController@index')->name('translation.signs');
//Route::get('translation' . '/{id}', 'TranslationController@singleIndex')->name('translation.single');
Route::get('create/{literal?}', 'TranslationController@createIndex')->name('translation.create');

Route::view('sign/Hjerte', 'pages.signs')->name('sign'); //TODO Slet når søgningen virker

// REQUEST //
Route::get('ask', 'RequestController@index')->name('request.index');

Auth::routes();

// EXTERNAL //
Route::get('facebook', 'ExternalController@facebook')->name('media.facebook');
Route::get('github', 'ExternalController@github')->name('media.github');
