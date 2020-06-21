<?php

use Illuminate\Support\Facades\Route;
Route::middleware(['set_locale'])->group(function (){
    Route::group([
        'middleware'=>'auth',
        'namespace'=>'Admin',
        Route::group([
            'middleware'=>'is_admin',
            'namespace'=>'Admin',
            'prefix'=>'admin'
        ],function (){
            Route::get('/','AdminController@index');
            Route::resource('flights','FlightsController');
            Route::resource('news','NewsController');
            Route::resource('airplanes','AirplanesController');
            Route::resource('cities','CitiesController');
            Route::resource('nutrition','NutritionController');
            Route::resource('airports','AirportsController');
            Route::resource('passengers','PassengersController');
        }),
        Route::group([
            'middleware'=>'is_cashier',
            'namespace'=>'Admin',
            'prefix'=>'cash'
        ],function (){
            Route::get('/','CashierController@index');
            Route::post('/findTicket','CashierController@findTicket');
        }),
        Route::group([
            'middleware'=>'is_booker',
            'namespace'=>'Admin',
            'prefix'=>'bookkeeping'
        ],function (){
            Route::get('/','BookerController@index');
            Route::post('/report','BookerController@report');
        }),
    ],function (){
        Route::get('/profile','UserController@index');
        Route::get('/profile/orders','UserController@orders');
        Route::post('/profile/orders/remove/{id_book}','UserController@remove');
        Route::post('/profile/sale/{id_book}','UserController@sale');
        Route::post('/profile/salechildren/{id_book}','UserController@salechildren');
        Route::post('/profile/sale/add/{id_book}','UserController@add');
        Route::post('/profile/sale/addchildren/{id_book}','UserController@addchildren');
        Route::post('/profile/status/{id_book}','UserController@status');
        Route::get('/profile/complete','UserController@complete');
    });
    Route::get('/logout','Auth\LoginController@logout')->name('get-logout');
    Auth::routes();
    Route::get('locale/{locale}','MainController@changeLocale')->name('locale');
    Route::post('/tickets','MainController@find_tickets');
    Route::post('/tickets/sale/{id}/{adults}/{children}/{price}','TicketsController@index');
    Route::get('/', 'MainController@index');
    Route::get('/info', 'MainController@info');
    Route::get('/tablo', 'TabloController@index');
    Route::post('/tablo/filter', 'TabloController@filter');
    Route::get('/news/{id_news}','NewsController@index');
    Route::get('/services','ServicesController@index');
    Route::get('/services/nutrition','ServicesController@nutrition');
    Route::get('/services/childrens','ServicesController@childrens');
    Route::get('/services/insurance','ServicesController@insurance');
    Route::get('/services/flight','ServicesController@flight');
    Route::get('/contacts','MainController@contacts');

});
