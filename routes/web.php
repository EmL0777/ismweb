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

Route::group(['prefix' => 'admin', 'as' => 'Admin.'], function (){
    Route::group(['namespace' => 'Auth'], function (){
        Route::get('login', 'LoginController@showLoginForm')->name('login');

        Route::post('auth/login', 'LoginController@login')->name('auth.login');

        Route::get('logout', 'LoginController@logout')->name('logout');
    });

    Route::group(['namespace' => 'Admin', 'middleware' => ['auth'],], function (){
        Route::get('/', function () {
            $title = 'Dashboard';
           return view('admin.dashboard', compact('title'));
        })->name('dashboard');

        // Abouts
        Route::post('abouts/reorder', 'AboutController@reorder')->name('abouts.reorder');
        Route::resource('abouts', 'AboutController');
        Route::resource('/about/languages', 'AboutLangController', ['names' => [
            'edit' => 'about.lang.edit',
            'update' => 'about.lang.update'
        ]])->only(['edit', 'update']);

        // News
        Route::resource('/news', 'NewsController');
        Route::resource('/news/languages', 'NewsLangController')
            ->only(['edit', 'update']);

        // Services/centers
        Route::group(['prefix' => 'services'], function (){
            Route::resource('/centers', 'ServiceCenterController');
        });
    });
});
