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

//Backend
Route::group(['middleware' => 'auth'], function () {
    //if user is admin
    Route::group(['prefix' => 'admin'], function() {
        
        Route::get('/', 'Backend\AdminController@index');

        //peticiones AJAX
        Route::get('/locations/getRegions', 'Backend\LocationsController@getRegions');
        Route::get('/locations/getProvinces/{id}', 'Backend\LocationsController@getProvinces');
        Route::get('/locations/getCities/{id}', 'Backend\LocationsController@getCities');

        //Export 
        Route::get('/products/export', 'Backend\ProductsController@export');
        Route::get('/categories/export', 'Backend\CategoriesController@export');
        Route::get('/guests/users/export', 'Backend\GuestUsersController@export');
        
        //ABM
        Route::resource('/users', 'Backend\UsersController');
        Route::resource('/roles', 'Backend\RolesController');
        Route::resource('/dni', 'Backend\DniController');
        Route::resource('/regions', 'Backend\RegionsController');
        Route::resource('/indicadores', 'Backend\IndicadoresController');
        Route::resource('/locations', 'Backend\LocationsController');
        Route::resource('/categories', 'Backend\CategoriesController');
        Route::resource('/products', 'Backend\ProductsController');
        Route::resource('/tips/categories', 'Backend\TipsCategoriesController');
        Route::resource('/tips', 'Backend\TipsController');
        Route::resource('/guests/users', 'Backend\GuestUsersController');
        Route::resource('/guests/questions', 'Backend\GuestQuestionsController');
        Route::resource('/guests', 'Backend\GuestsController');
        
        //Settings
        Route::resource('/settings/politics_privacy', 'Backend\PoliticsPrivacyController');
        Route::resource('/settings/legal_products', 'Backend\LegalProductsController');
        Route::resource('/settings/social_networks', 'Backend\SocialNetworksController');
        Route::resource('/settings/emails', 'Backend\EmailsController');
        
    });
  
    Route::group(['prefix' => 'api'], function() {
        Route::group(['namespace' => 'Api'], function() {
            
            Route::resource('employees', 'EmployeesController');
            Route::resource('users', 'UsersController');
            
            Route::get(
                'employees/{employee_id}/orders', [
                'as' => 'employees.orders',
                'uses' => 'EmployeesController@getOrdersByEmployee'
            ]);
        });
    });
});


//Frontend

Route::get('/', 'Frontend\HomeController@index');

//auth
Route::get('/ingresar', 'Frontend\AuthController@login');
Route::get('/registrate', 'Frontend\AuthController@register');
Route::get('/recuperar-contrasena', 'Frontend\AuthController@passwordRecovery');

//catalogue
Route::get('/catalogo', 'Frontend\CatalogueController@index');
Route::get('/catalogo/producto', 'Frontend\CatalogueController@product');
Route::get('/catalogo/success', 'Frontend\CatalogueController@success');


//dashboard
Route::get('/dashboard', 'Frontend\DashboardController@index');