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
    return view('welcome');
});
Auth::routes();


Route::group(['middleware' => 'auth'], function (){
    
    Route::get('/home', 'HomeController@index')->name('home');
    
    Route::get('/customer', 'CustomerController@index');
    Route::get('/customer/register', 'CustomerController@create')->name('customer.register');
    Route::post('/customer/register', 'CustomerController@store')->name('customer.register.submit');
    Route::get('/customer/list', 'CustomerController@list')->name('customer.list');
    Route::get('/customer/list/ajax', 'CustomerController@getCustomers')->name('customer.list.ajax');
});


