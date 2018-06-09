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

//home
Route::get('/', 'Frontend\HomeController@index');

//auth
Route::get('/registro', 'Frontend\AuthController@indexRegister');
Route::post('/registro/store', 'Frontend\AuthController@storeRegister');

//logros
Route::get('/logros', function(){
    return view('frontend.logros');
});

//terminos y condiciones
Route::get('/terminos', function(){
    return view('frontend.terminos');
});

//logros
Route::get('/logros', function(){
    return view('frontend.logros');
});

//contactanos
Route::get('/contactanos', function(){
    return view('frontend.contactanos');
});

//BACKEND
Route::group(['middleware' => ['auth', 'admin']], function () {
    
    Route::group(['prefix' => 'admin'], function() {

        //Route::get('/', 'Backend\AdminController@index');
        Route::get('/', function(){
            return redirect('/admin/products');
        });

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
        Route::resource('/desempeno', 'Backend\UsersGanadoresController');
        Route::resource('/roles', 'Backend\RolesController');
        Route::resource('/dni', 'Backend\DniController');
        Route::resource('/users_ganadores', 'Backend\UsersGanadoresController');
        Route::resource('/regions', 'Backend\RegionsController');
        Route::resource('/indicadores', 'Backend\IndicadoresController');
        Route::resource('/locations', 'Backend\LocationsController');
        Route::resource('/categories', 'Backend\CategoriesController');
        Route::resource('/products', 'Backend\ProductsController');
        Route::resource('/exchanges', 'Backend\ExchangesController');
        Route::resource('/tips/categories', 'Backend\TipsCategoriesController');
        Route::resource('/tips', 'Backend\TipsController');
        Route::resource('/guests/users', 'Backend\GuestUsersController');
        Route::resource('/guests/questions', 'Backend\GuestQuestionsController');
        Route::resource('/guests', 'Backend\GuestsController');
        Route::resource('/modals', 'Backend\ModalsController');

        //Settings
        Route::resource('/settings/politics_privacy', 'Backend\PoliticsPrivacyController');
        Route::resource('/settings/legal_products', 'Backend\LegalProductsController');
        Route::resource('/settings/social_networks', 'Backend\SocialNetworksController');
        Route::resource('/settings/emails', 'Backend\EmailsController');

    });
    
});    
    
//FRONTEND
Route::group(['middleware' => 'auth'], function () {    
    
    //auth
    Route::get('/validar-dni', 'Frontend\AuthController@showValidarDni');
    Route::post('/validar-dni', 'Frontend\AuthController@updateValidarDni');
    
    //user
    Route::get('/usuario/mi-cuenta', 'Frontend\UserController@profileEdit');
    Route::get('/usuario/historial', 'Frontend\UserController@history');
    Route::get('/usuario/canjes', 'Frontend\UserController@indexExchanges');
    Route::get('/usuario/canjes/{id}', 'Frontend\UserController@showExchanges');

    //user POST
    Route::post('/usuario/mi-cuenta', 'Frontend\UserController@profileUpdate');
    Route::post('/usuario/canjes/{id}', 'Frontend\UserController@updateExchanges');
    
    //catalogue
    Route::get('/catalogo', 'Frontend\CatalogueController@index');
    Route::get('/catalogo/producto/success', 'Frontend\CatalogueController@productSuccess');
    Route::get('/catalogo/producto/{id}', 'Frontend\CatalogueController@productShow');    
    
    //catalogue POST
    Route::post('/catalogo/producto/{id}', 'Frontend\CatalogueController@productExchange');
    
    //desempeño
    Route::get('/desempeno', 'Frontend\DesempenoController@index');

    //ranking
    Route::get('/ranking', 'Frontend\RankingController@index');

    //dashboard
    Route::get('/dashboard', 'Frontend\DashboardController@index');

    //Encuestas
    Route::get('/encuestas', 'Frontend\GuestsController@index');
    Route::get('/encuestas/{id}', 'Frontend\GuestsController@show');
    Route::post('/encuestas/{id}', 'Frontend\GuestsController@store');

    //Consejos
    Route::get('/consejos', 'Frontend\TipsController@index');
    Route::get('/consejos/{id}', 'Frontend\TipsController@show');
    
    //qué es
    Route::get('/que-es', function(){
        return view('frontend.quees');
    });
    
    //ajax
    Route::get('/desempeno_name/{name}', 'Frontend\DesempenoController@desempenosForName');
    Route::get('/ranking/{id_region}', 'Frontend\RankingController@ajax');


});


//API
Route::group(['prefix' => 'api'], function() {
    
    //USER

    //auth
    Route::get('/user/login', 'Api\UserApiController@login');
    Route::get('/user/logout', 'Api\UserApiController@logout');
    
    //alta modificacion
    Route::get('/user/create', 'Api\UserApiController@store');
    Route::get('/user/edit', 'Api\UserApiController@update');
    
    //info user
     
    // user show, con estos datos el form se envia a /api/user/edit para ser editado
    Route::get('/user/mi-cuenta/{id_user}', 'Api\UserApiController@miCuenta');//edit -> update    
    Route::get('/user/historial/{id_user}', 'Api\UserApiController@history'); 
    Route::get('/user/canjes/{id_user}', 'Api\UserApiController@allCanjes');
    Route::get('/user/canjes/single/{id_canje}', 'Api\UserApiController@singleCanje');
    Route::get('/user/canjes/single/confirmar/{id_canje}', 'Api\UserApiController@singleCanjeConfirmar');
    
    
    // Encuestas
    Route::get('/user/encuestas/{id_user}', 'Api\GuestsApiController@allGuests');
    Route::get('/user/encuestas/{id_user}/{id_guest}', 'Api\GuestsApiController@showGuest');
    Route::get('/user/encuestas/{id_user}/{id_guest}/store', 'Api\GuestsApiController@storeGuest');
 
   // Catalogo 
   
});