<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use Database\Seeders\ProductSeeder;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\EnsureTokenIsValid;

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

    Route::get('/', 'ProductController@index')->name('home.index');
    Route::get('/item/{id}', 'ProductController@item')->name('item');
    Route::get('/product-list', 'ProductController@productList')->name('productList');
    Route::post('/searchproduct', 'ProductController@searchProduct')->name('searchProduct');


    Route::get('product', [ProductController::class, 'all'])->name('product');



    Route::group(['middleware' => ['auth']], function () {
        /**
         * Logout Routes
         */

        Route::get('/logout', 'LogoutController@perform')->name('logout.perform');
        Route::get('/myaccount', 'HomeController@myaccount')->name('myaccount');


        /*product*/
        Route::get('/add-item/{id}', 'ProductController@addcountCart')->name('add.item');
        Route::get('/remove-item/{id}', 'ProductController@removecountCart')->name('remove.item');
        /*user */
        Route::get('edit-account/{id}', [HomeController::class, 'edit']);
        Route::put('update-account/{id}', [HomeController::class, 'update']);


        Route::get('/cart', 'ProductController@cart')->name('cart');
        Route::get('/favorite', 'ProductController@favorite')->name('favorite');
        Route::get('/add-to-cart/{id}', 'ProductController@addToCart')->name('add.to.cart');
        Route::get('/add-to-fav/{id}', 'ProductController@addToFav')->name('add.to.fav');
        Route::get('/remove-to-cart/{id}', 'ProductController@addToCart')->name('remove.to.cart');
        Route::get('/remove-to-fav/{id}', 'ProductController@addToCart')->name('remove.to.fav');
        Route::delete('/remove-from-cart/{id}', 'ProductController@remove')->name('remove.from.cart');
        Route::delete('/remove-from-fav/{id}', 'ProductController@removeFav')->name('remove.from.fav');
    });

    Route::middleware(['auth', 'is_admin'])->group(function () {
        Route::get('/dashboard', 'AdminController@dashboard')->name('dashboard');
        Route::put('update-account', [HomeController::class, 'update']);

        /*dashboard */
        Route::get('add-product', [ProductController::class, 'create']);
        Route::post('add-product', [ProductController::class, 'store']);
        Route::get('edit-product/{id}', [ProductController::class, 'edit']);
        Route::put('update-product/{id}', [ProductController::class, 'update']);
        Route::delete('delete-product/{id}', [ProductController::class, 'destroy']);

        Route::get('edit-user/{id}', [AdminController::class, 'edit']);
        Route::put('update-user/{id}', [AdminController::class, 'update']);
        Route::delete('delete-user/{id}', [AdminController::class, 'destroy']);
    });
});