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
    return view('frontend.index');
});

Route::group(['prefix' => 'admin'], function (){
    Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');

    Route::post('auth/login', 'Auth\LoginController@login')->name('auth.login');

    Route::get('logout', 'Auth\LoginController@logout')->name('logout');

    Route::get('/', function () {
        $title = 'Dashboard';
       return view('admin.dashboard', compact('title'));
    })->name('admin.dashboard')->middleware('auth');

    Route::group(['prefix' => 'services'], function (){
        Route::resource('/centers', 'ServiceCenterController')->middleware('auth');
    });

    Route::resource('/news', 'NewsController')->middleware('auth');

    Route::resource('/news/languages', 'NewsLangController')
        ->only(['edit', 'update'])
        ->middleware('auth');

    Route::resource('abouts', 'AboutController')->middleware('auth');
    Route::post('abouts-sortable','AboutController@updateSort')
        ->middleware('auth')
        ->name('abouts.sortable');
});
