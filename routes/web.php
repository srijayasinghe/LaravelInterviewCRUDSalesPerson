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


Route::get('/sales/person/list', 'App\Http\Controllers\WebController@listAction')->name('salesPersonList');

Route::get('/sales/person/edit/{id}', 'App\Http\Controllers\WebController@editAction');

Route::get('/sales/person/add', 'App\Http\Controllers\WebController@createAction');
