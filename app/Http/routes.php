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
        Route::resource('/itec', 'Backend\ItecController');
        Route::resource('/regions', 'Backend\RegionsController');
        Route::resource('/locations', 'Backend\LocationsController');
        Route::resource('/categories', 'Backend\CategoriesController');
        Route::resource('/products', 'Backend\ProductsController');
        Route::resource('/tips/categories', 'Backend\TipsCategoriesController');
        Route::resource('/tips', 'Backend\TipsController');
        Route::resource('/guests/questions', 'Backend\GuestQuestionsController');
        Route::resource('/guests', 'Backend\GuestsController');
        
        //Settings
        Route::resource('/settings/politics_privacy', 'Backend\PoliticsPrivacyController');
        Route::resource('/settings/legal_products', 'Backend\LegalProductsController');
        Route::resource('/settings/social_networks', 'Backend\SocialNetworksController');
        Route::resource('/settings/emails', 'Backend\EmailsController');
        
    });
});
