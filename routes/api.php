<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

/*Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});*/

// Route::apiResource('users', 'UserController');
// Route::apiResource('entreprises', 'EnterpriseController');

// Route::apiResource('offers', 'OfferController');

Route::post('api/register', 'API\RegisterController@register');
Route::post('api/login', 'API\RegisterController@login');




Route::middleware('auth:api', )->group( function () {
    Route::resource('offers', 'OfferController');
    Route::resource('enterprises', 'EnterpriseController');
    Route::delete('eliminar/{idOffer}.{idUser}', 'IWillGoController@eliminar');
    Route::resource('iWillGoes', 'IWillGoController');
    Route::patch('valorar/{idOffer}.{idUser}', 'IWillGoController@update');
    Route::get('OfertaBar', 'OfferController@ofertaConEmpresaBar');
    Route::get('OfertaDiscoteca', 'OfferController@ofertaConEmpresaDiscoteca');
    Route::get('OfertaRestaurante', 'OfferController@ofertaConEmpresaRestaurante');
    Route::patch('users/{id}', 'UserController@update');
    Route::get('users/{id}', 'UserController@show');
    Route::get('inscritos/{id}', 'IWillGoController@personasInscritas');
    });

Route::post('filtros', 'OfferController@filtros');

Route::get('tipo/{type}', 'EnterpriseController@typeEnterprise');


