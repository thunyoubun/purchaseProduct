<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProductController;
use Database\Seeders\ProductSeeder;
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

Route::group(['namespace' => 'App\Http\Controllers'], function () {
    /**
     * Home Routes
     */
    Route::get('/', 'ProductController@index')->name('home.index');

    Route::group(['middleware' => ['guest']], function () {
        /**
         * Register Routes
         */
        Route::get('/register', 'RegisterController@show')->name('register.show');
        Route::post('/register', 'RegisterController@register')->name('register.perform');
        /**
         * Login Routes
         */
        Route::get('/login', 'LoginController@show')->name('login.show');
        Route::post('/login', 'LoginController@login')->name('login.perform');
    });
    Route::group(['middleware' => ['auth']], function () {
        /**
         * Logout Routes
         */

        Route::get('/logout', 'LogoutController@perform')->name('logout.perform');

        Route::get('/dashboard', 'AdminController@dashboard')->name('dashboard');
        Route::get('/myaccount', 'HomeController@myaccount')->name('myaccount');

        Route::get('add-product', [ProductController::class, 'create']);
        Route::post('add-product', [ProductController::class, 'store']);
        Route::get('edit-product/{id}', [ProductController::class, 'edit']);
        Route::put('update-product/{id}', [ProductController::class, 'update']);
        Route::get('delete-product/{id}', [ProductController::class, 'destroy']);

        Route::get('edit-user/{id}', [AdminController::class, 'edit']);
        Route::get('delete-user/{id}', [AdminController::class, 'destroy']);
        Route::put('update-user/{id}', [AdminController::class, 'update']);

        Route::get('/add-item/{id}', 'ProductController@addcountCart')->name('add.item');
        Route::get('/item/{id}', 'ProductController@item')->name('item');
        Route::get('/cart', 'ProductController@cart')->name('cart');
        Route::get('/add-to-cart/{id}', 'ProductController@addToCart')->name('add.to.cart');
        Route::get('/remove-to-cart/{id}', 'ProductController@addToCart')->name('remove.to.cart');
        Route::delete('/remove-from-cart/{id}', 'ProductController@remove')->name('remove.from.cart');
    });
});