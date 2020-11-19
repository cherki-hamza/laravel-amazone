<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(['middleware' => ['auth']], function () {

    Route::group(['prefix' => 'admin'] , function () {

        Route::get('/' , 'backend\AdminController@index')->name('admin');

        Route::get('/profile/{id}' , 'backend\AdminController@profile')->name('admin.profile');
        Route::post('/profile/{id}' , 'backend\AdminController@update_profile')->name('admin.profile.update');

        Route::get('/users' , 'backend\AdminController@all_users')->name('admin.users');

    });

});




Auth::routes();
