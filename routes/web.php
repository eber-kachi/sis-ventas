<?php

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
    return view('layouts.clienteTeplate'); // para visualizar el cambio de cliente
//    return view('layouts.adminReports'); // para visualizar la administracion
});

Auth::routes();
Route::post('/registerData', 'Auth\RegisterController@registerData')->name('registerData');
Route::get('/home', 'HomeController@index')->name('home');


Route::get('auth/google', 'Auth\LoginController@redirectToGoogle');
Route::get('auth/google/callback', 'Auth\LoginController@handleGoogleCallback');

Route::group([
    'prefix' => 'categories',
], function () {
    Route::get('/', 'CategoriesController@index')
         ->name('categories.category.index');
    Route::get('/create','CategoriesController@create')
         ->name('categories.category.create');
    Route::get('/show/{category}','CategoriesController@show')
         ->name('categories.category.show');
    Route::get('/{category}/edit','CategoriesController@edit')
         ->name('categories.category.edit');
    Route::post('/', 'CategoriesController@store')
         ->name('categories.category.store');
    Route::put('category/{category}', 'CategoriesController@update')
         ->name('categories.category.update');
    Route::delete('/category/{category}','CategoriesController@destroy')
         ->name('categories.category.destroy');
});

Route::group([
    'prefix' => 'store',
], function () {
    Route::get('/', 'StoreController@index')
        ->name('stores.store.index');
    Route::get('/view/{store}', 'StoreController@indexStore')
        ->name('stores.store.indexStore');
    Route::get('/create','StoreController@create')
        ->name('stores.store.create');
    Route::get('/{store}/edit','StoreController@edit')
        ->name('stores.store.edit');
    Route::post('/', 'StoreController@store')
        ->name('stores.store');
    Route::put('stores/{store}', 'StoreController@update')
        ->name('stores.store.update');
    Route::delete('/view/{store}','StoreController@destroy')
        ->name('stores.store.destroy');

});

Route::group([
    'prefix' => 'products',
], function () {
    Route::get('/', 'ProductsController@index')
         ->name('products.product.index');
    Route::get('/create','ProductsController@create')
         ->name('products.product.create');
    Route::get('/show/{product}','ProductsController@show')
         ->name('products.product.show');
    Route::get('/{product}/edit','ProductsController@edit')
         ->name('products.product.edit');
    Route::post('/', 'ProductsController@store')
         ->name('products.product.store');
    Route::put('product/{product}', 'ProductsController@update')
         ->name('products.product.update');
    Route::delete('/product/{product}','ProductsController@destroy')
         ->name('products.product.destroy');
});
