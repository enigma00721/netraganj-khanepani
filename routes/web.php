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
    
    // Route::get('/customer', 'CustomerController@index');
    Route::get('/customer/list', 'CustomerController@list')->name('customer.list');
    Route::get('/customer/list/ajax', 'CustomerController@getCustomers')->name('customer.list.ajax');

    Route::get('/customer/register', 'CustomerController@create')->name('customer.register');
    Route::post('/customer/register', 'CustomerController@store')->name('customer.register.submit');

    Route::get('/customer/edit/{id}', 'CustomerController@edit')->name('customer.edit');
    Route::put('/customer/update/{id}', 'CustomerController@update')->name('customer.update');
    Route::post('/customer/delete/{id}', 'CustomerController@destroy')->name('customer.delete');

    Route::get('/meter/naamsaari', 'MeterController@meterNaamsaari')->name('meter.naamsaari');
    Route::get('/meter/naamsaari/edit/{id}', 'MeterController@meterNaamsaariEdit')->name('meter.naamsaari.edit');
    Route::post('/meter/naamsaari/search', 'MeterController@meterNaamsaariSearchSubmit')->name('meter.naamsaari.search.submit');
    Route::post('/meter/naamsaari/submit/{id}', 'MeterController@meterNaamsaariSubmit')->name('meter.naamsaari.submit');

    Route::get('/meter/thaausaari', 'MeterController@meterThaausaari')->name('meter.thaausaari');
    Route::post('/meter/thaausaari/search', 'MeterController@meterThaausaariSearchSubmit')->name('meter.thaausaari.search.submit');
    Route::post('/meter/thaausaari/submit', 'MeterController@meterThaausaariSubmit')->name('meter.thaausaari.submit');

    Route::get('/meter/change', 'MeterController@meterChange')->name('meter.change');
    Route::post('/meter/change/search', 'MeterController@meterChangeSearchSubmit')->name('meter.change.search.submit');
    
    Route::get('/meter/disconnect', 'MeterController@meterDisconnect')->name('meter.disconnect');
    Route::post('/meter/disconnect/search', 'MeterController@meterDisconnectSearchSubmit')->name('meter.disconnect.search.submit');
});


