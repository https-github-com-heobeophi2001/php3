<?php

use App\Models\User;
use Illuminate\Support\Facades\DB;
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

Route::get('/', function () {
    return view('welcome');
});

Route::view('/welcome', 'welcome');
Route::group([
    //config
    'prefix' => 'admin',
    'as' => 'admin.',
    'namespace' => 'Admin',
], function () {
    Route::group([
        'prefix' => 'users',
        'as' => 'users.'
    ], function () {
        Route::get('/', 'UserController@index')->name('index');
        Route::get('create', 'UserController@create')->name('create-user');
        Route::get('show/{id}', 'UserController@show')->name('show');
        Route::post('store', 'UserController@store')->name('store');
        Route::get('edit/{id}', 'UserController@edit')->name('edit');
        Route::post('edit/{id}', 'UserController@update')->name('update');
        Route::post('delete/{id}', 'UserController@delete')->name('delete');
    });
});
Route::group([
    //config category
    'prefix' => 'admin',
    'as' => 'admin.',
    'namespace' => 'Admin'
], function () {
    Route::group([
        'prefix' => 'categories',
        'as'=> 'categories.'
    ], function(){
        Route::get('/', 'CategoryController@index')->name('index');
        Route::get('create', 'CategoryController@create')->name('add');
        Route::post('store', 'CategoryController@store')->name('store');
        Route::get('edit/{id}', 'CategoryController@edit')->name('edit');
        Route::post('edit/{id}', 'CategoryController@update')->name('update');
        Route::post('delete/{id}', 'CategoryController@delete')->name('delete');
    });
});
Route::group([
    //config product
    'prefix' => 'admin',
    'as' => 'admin.',
    'namespace' => 'Admin'
], function () {
    Route::group([
        'prefix' => "products",
        'as' => "products."
    ], function () {
        Route::get('/', 'ProductController@index')->name('index');
        Route::get('create', 'ProductController@create')->name('add');
        Route::post('store', 'ProductController@store')->name('store');
        Route::get('edit/{id}', 'ProductController@edit')->name('edit');
        Route::post('edit/{id}', 'ProductController@update')->name('update');
        Route::post('delete/{id}', 'ProductController@delete')->name('delete');
    });
});

