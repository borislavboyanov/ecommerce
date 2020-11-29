<?php

use Illuminate\Support\Facades\Route;

// Auth::loginUsingId(1);

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

Route::get('/',                                         'App\Http\Controllers\Guest\PageController@index');

Route::group(['middleware' => ['guest', 'guest:admin']], function () {
    Route::get('/register',                            'App\Http\Controllers\Guest\PageController@showRegister');
    Route::get('/login',                               'App\Http\Controllers\Guest\PageController@showLogin');
    Route::get('/admin/login',                         'App\Http\Controllers\Guest\PageController@showAdminLogin');
    Route::get('/verification/{uuid}/{activationKey}', 'App\Http\Controllers\Guest\ActionController@verify');
    Route::post('/guest/register',                     'App\Http\Controllers\Guest\ActionController@register');
    Route::post('/guest/login',                        'App\Http\Controllers\Guest\ActionController@login');
    Route::post('/guest/adminLogin',                   'App\Http\Controllers\Guest\ActionController@adminLogin');
});

Route::group(['middleware' => 'auth'], function () {
    Route::post('/client/addCartItem',                  'App\Http\Controllers\Client\ActionController@addCartItem');
    Route::post('/client/editCartItem',                 'App\Http\Controllers\Client\ActionController@editCartItem');
    Route::post('/client/deleteCartItem',               'App\Http\Controllers\Client\ActionController@deleteCartItem');
    Route::post('/client/addWishlistItem',              'App\Http\Controllers\Client\ActionController@addWishlistItem');
    Route::post('/client/deleteWishListItem',           'App\Http\Controllers\Client\ActionController@deleteWishListItem');

});
