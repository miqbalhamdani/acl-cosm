<?php
use App\Http\Controllers\LanguageController;
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
// dashboard Routes
Route::get('/','StarterKitController@index');
Route::get('/sk-layout-1-column','StarterKitController@column_1Sk');
Route::get('/sk-layout-2-columns','StarterKitController@columns_2Sk');
Route::get('/fixed-navbar','StarterKitController@fix_navbar');
Route::get('/sk-layout-fixed','StarterKitController@fix_layout');
Route::get('/sk-layout-static','StarterKitController@static_layout');

// locale Route
Route::get('lang/{locale}',[LanguageController::class,'swap']);

// acess controller
Route::get('/access-control', 'AccessController@index');
Route::get('/access-control/{roles}', 'AccessController@roles');
Route::get('/ecommerce', 'AccessController@home')->middleware('role:Admin');

Auth::routes();
