<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::post('/person', 'App\Http\Controllers\Api\V1\PeopleController@createAction')->name('PersonCreate');

Route::put('/person', 'App\Http\Controllers\Api\V1\PeopleController@editAction')->name('PersonUpdate');

Route::delete('/person/{id}','App\Http\Controllers\Api\V1\PeopleController@deleteAction')->name('PersonDelete');

Route::get('/person/list', 'App\Http\Controllers\Api\V1\PeopleController@listAction')->name('PersonList');

Route::get('/person/{id}','App\Http\Controllers\Api\V1\PeopleController@viewAction')->name('PersonView');
