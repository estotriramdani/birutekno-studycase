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
    return view('home');
});

Route::get('/employees', 'EmployeeController@index');
Route::get('/employees/add', 'EmployeeController@create');
Route::post('/employees/add', 'EmployeeController@store');

Route::get('/employees/edit/{employees:id}', 'EmployeeController@edit');
Route::patch('/employees/edit/{employees:id}', 'EmployeeController@update');

Route::delete('/employees/delete/{employees:id}', 'EmployeeController@destroy');

Route::get('/recaps/add', 'RecapController@create');
Route::post('/recaps/add', 'RecapController@store');

Route::get('/recaps', 'RecapController@index');
Route::get('/recaps/edit/{recaps:id}', 'RecapController@edit');
Route::patch('/recaps/edit/{recaps:id}', 'RecapController@update');

Route::delete('/recaps/delete/{recaps:id}', 'RecapController@destroy');