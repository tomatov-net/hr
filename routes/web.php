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

Route::group(['prefix' => 'advanced', 'as' => 'advanced.'], function (){
    Route::group(['prefix' => 'products', 'as' => 'products.'], function (){
        Route::get('/', 'ProductController@index_advanced')->name('index');
    });

    Route::group(['prefix' => 'orders', 'as' => 'orders.'], function (){
        Route::get('/', 'OrderController@index_advanced')->name('index');
        Route::get('/', 'OrderController@index_advanced')->name('index');
        Route::get('edit/{id}', 'OrderController@edit')->name('edit');
        Route::post('update/{id}', 'OrderController@update')->name('update');
    });
});



Route::group(['prefix' => 'orders', 'as' => 'orders.'], function (){
    Route::get('/', 'OrderController@index')->name('index');
    Route::get('edit/{id}', 'OrderController@edit')->name('edit');
    Route::post('update/{id}', 'OrderController@update')->name('update');
});

Route::group(['prefix' => 'products', 'as' => 'products.'], function (){
    Route::get('/', 'ProductsController@index')->name('index');
    Route::get('edit/{id}', 'ProductsController@edit')->name('edit');
    Route::post('update/{id}', 'ProductsController@update')->name('update');
});

Route::group(['prefix' => 'weather', 'as' => 'weather.'], function (){
    Route::get('/', 'WeatherController@index')->name('index');
});
