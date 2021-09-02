<?php

use App\Http\Controllers\WebsiteLayout\HomeController;
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
Route::get('/', [HomeController::class, 'index'] )->name('welcome');
Route::get('/shop', [HomeController::class, 'shop'])->name('shop');
Route::get('/detail/{id}', [HomeController::class, 'detail'])->name('detail');
Route::get('/checkout', [HomeController::class, 'checkout'])->name('checkout');
Route::get('/category/{id}', [HomeController::class, 'category'])->name('category');
Route::get('/cart', [HomeController::class, 'cart'])->name('cart');
Route::get('/add-cart/{id}', [HomeController::class, 'addCart'])->name('addCart');


Route::get('/', function () {
    return view('welcome');
});
Route::view('/welcome', 'welcome')->name('welcome');

Route::group([
    'middleware' => ['check_login'],
], function () {
    //user
    Route::group([
        //config
        'prefix' => 'admin',
        'as' => 'admin.',
        'namespace' => 'Admin',
        'middleware' => ['check_admin']
    ], function () {
        Route::group([
            'prefix' => 'users',
            'as' => 'users.',
        ], function () {
            Route::get('/', 'UserController@index')->name('index');
            Route::get('create', 'UserController@create')->name('create');
            Route::get('show/{user}', 'UserController@show')->name('show');
            Route::post('store', 'UserController@store')->name('store');
            Route::get('edit/{user}', 'UserController@edit')->name('edit');
            Route::post('edit/{user}', 'UserController@update')->name('update');
            Route::get('delete/{user}', 'UserController@delete')->name('delete');
        });
    });
    //end user
    //cate
    Route::group([
        'prefix' => 'admin',
        'as' => 'admin.',
        'namespace' => 'Admin',
        'middleware' => ['check_admin']

    ], function () {
        Route::group([
            'prefix' => 'categories',
            'as' => 'categories.'
        ], function () {
            Route::get('/', 'CategoryController@index')->name('index');
            Route::get('create', 'CategoryController@create')->name('add');
            Route::post('store', 'CategoryController@store')->name('store');
            Route::get('edit/{id}', 'CategoryController@edit')->name('edit');
            Route::post('edit/{id}', 'CategoryController@update')->name('update');
            Route::get('delete/{id}', 'CategoryController@delete')->name('delete');
        });
    });
    //end cate
    //product
    Route::group([
        'prefix' => 'admin',
        'as' => 'admin.',
        'namespace' => 'Admin',
        'middleware' => ['check_admin']

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
            Route::get('delete/{id}', 'ProductController@delete')->name('delete');
        });
    });
    //end product
    //invoice
    Route::group([
        'prefix' => 'admin',
        'as' => 'admin.',
        'namespace' => 'Admin',
        'middleware' => ['check_admin']

    ], function () {
        Route::group([
            'prefix' => "invoices",
            'as' => "invoices."
        ], function () {
            Route::get('/', 'InvoiceController@index')->name('index');
            Route::get('show/{id}', 'InvoiceController@show')->name('show');
            Route::post('delete/{id}', 'InvoiceController@delete')->name('delete');
        });
    });
    //end invoice
});



Route::get('login', 'Auth\LoginController@getLoginForm')->name('auth.getLoginForm');
Route::post('login', 'Auth\LoginController@login')->name('auth.login');
Route::get('logout', 'Auth\LoginController@logout')->name('auth.logout');


/*
match: mapping url với callback tương ứng, mapping nhiều phương thức
any: mapping url voi callback tuong ung, mapping voi tat ca phuong thuc http
*/
