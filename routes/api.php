<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::group([

    'middleware' => 'api',
    'prefix' => 'auth'

], function ($router) {

    Route::post('login', 'AuthController@login');
    Route::post('signup', 'AuthController@signup');
    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
    Route::post('me', 'AuthController@me');

});

Route::apiResource('/employees', 'Api\EmployeeController');
Route::apiResource('/suppliers', 'Api\SupplierController');
Route::apiResource('/categories', 'Api\CategoryController');
Route::apiResource('/products', 'Api\ProductController');
Route::apiResource('/expenses', 'Api\ExpenseController');
Route::apiResource('/salaries', 'Api\SalarController');
Route::apiResource('/customers', 'Api\CustomerController');

Route::get('/addCart/{id}', 'Api\CartController@addCart');
Route::get('/cart', 'Api\CartController@cart');
Route::delete('/remove/cart/{pos}', 'Api\CartController@removeCart');
Route::get('/increment/{id}', 'Api\CartController@increment');
Route::get('/decrement/{id}', 'Api\CartController@decrement');



Route::post('/salar/pay/{id}', 'Api\SalarController@pay');
Route::get('/salaries', 'Api\SalarController@index');
Route::get('/view/salar/{id}', 'Api\SalarController@view');
Route::get('/edit/salar/{id}', 'Api\SalarController@edit');

Route::post('/edit/stock/{id}', 'Api\ProductController@stock');

// pos router
Route::get('/getting/product/{id}', 'Api\PosController@getProduct');
Route::post('/order', 'Api\PosController@order');

// order route 
Route::get('/get/orders', 'Api\OrderController@getOrder');
Route::get('/order/details/{id}', 'Api\OrderController@details');
Route::get('/order/orderdetails/{id}', 'Api\OrderController@detailsAll');
Route::post('/order/search', 'Api\OrderController@search');

// Admin Route  
Route::get('/sell', 'Api\PosController@Sell');
Route::get('/icom', 'Api\PosController@Icom');
Route::get('/exp', 'Api\PosController@exp');
Route::get('/stock', 'Api\PosController@stock');