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

use Illuminate\Support\Facades\Route;

Auth::routes();

Route::get('home/user/logout', function () {
    Auth()->guard('web')->logout();
    return redirect('/login');
});


Route::get('/', function () {
    return view('welcome');
});



Route::get('/Items', 'ItemsController@index');

    Route::get('/cart', 'CartController@index')->name('cart.index')->middleware(['auth:web']);
    Route::post('/cart', 'CartController@add')->name('cart.add');
    Route::post('/cart/conditions', 'CartController@addCondition')->name('cart.addCondition');
    Route::delete('/cart/conditions', 'CartController@clearCartConditions')->name('cart.clearCartConditions');
    Route::get('/cart/details', 'CartController@details')->name('cart.details');
    Route::delete('/cart/{id}', 'CartController@delete')->name('cart.delete');

    


// Route::get('/cart','CartController@index')->name('cart.index');
// Route::post('/cart','CartController@add')->name('cart.add');
// Route::post('/cart/conditions','CartController@addCondition')->name('cart.addCondition');
// Route::delete('/cart/conditions','CartController@clearCartConditions')->name('cart.clearCartConditions');
// Route::get('/cart/details','CartController@details')->name('cart.details');
// Route::delete('/cart/{id}','CartController@delete')->name('cart.delete');

// Route::group(['prefix' => 'wishlist'],function()
// {
//     Route::get('/','WishListController@index')->name('wishlist.index');
//     Route::post('/','WishListController@add')->name('wishlist.add');
//     Route::get('/details','WishListController@details')->name('wishlist.details');
//     Route::delete('/{id}','WishListController@delete')->name('wishlist.delete');
// });


Route::get('/home', 'HomeController@index')->name('home');
