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

Route::group(['prefix' => 'auth'], function ($router) {

    Route::post('login', 'AuthController@login');
    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
    Route::post('me', 'AuthController@me');

});

Route::group(['middleware' => 'jwt.auth'], function ($router) {

    Route::get('/teams', 'TeamsController@index');
    Route::get('/teams/{id}', 'TeamsController@listPlayers');
    Route::post('/teams', 'TeamsController@store');
    Route::put('/teams/{id}', 'TeamsController@update');

    Route::post('/players', 'PlayersController@store');
    Route::put('/players/{id}', 'PlayersController@update');
    Route::get('/players/{id}', 'PlayersController@show');
    Route::get('/players', 'PlayersController@index');

});

Auth::routes();