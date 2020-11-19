<?php

use Illuminate\Support\Facades\Route;

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


// route for the main home website page
Route::get('/' , 'frontend\SiteController@index')->name('site');

// route for profile
Route::get('/profile/{user}' , 'frontend\SiteController@profile')->name('profile');

// route for edit profile
Route::get('/edit/{user}' , 'frontend\SiteController@edit')->name('edit');

// route for settings
Route::get('/settings' , 'frontend\SiteController@settings')->name('settings');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
