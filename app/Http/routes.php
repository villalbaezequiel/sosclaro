<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::auth();

//admin
Route::group(['middleware' => 'auth'], function () {
    //if user is admin
    Route::group(['prefix' => 'admin'], function() {
        
        Route::get('/', 'Backend\AdminController@index');

        //peticiones AJAX
        Route::get('/locations/getRegions', 'Backend\LocationsController@getRegions');
        Route::get('/locations/getProvinces/{id}', 'Backend\LocationsController@getProvinces');
        Route::get('/locations/getCities/{id}', 'Backend\LocationsController@getCities');
        
        //ABM
        Route::resource('/users', 'Backend\UsersController');
        Route::resource('/roles', 'Backend\RolesController');
        Route::resource('/locations', 'Backend\LocationsController');
        
    });
});
