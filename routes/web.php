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
// locale Route
Route::get('lang/{locale}',[LanguageController::class,'swap']);

// acess controller
Route::get('/access-control', 'AccessController@index');
Route::get('/access-control/{roles}', 'AccessController@roles');
Route::get('/ecommerce', 'AccessController@home')->middleware('role:Admin');

Auth::routes();

// dashboard Routes
Route::group(['prefix' => 'admin', 'middleware' => ['auth']] , function()
{
    Route::get('/', function() {
        return view('admin.dashboard');
    });

    /*
    |--------------------------------------------------------------------------
    | BRAND
    |--------------------------------------------------------------------------
    */
    Route::get('brand', 'BrandsController@index');
    Route::get('brand/add', 'BrandsController@store');
    Route::post('brand/add', 'BrandsController@store');
    Route::get('brand/edit/{id}', 'BrandsController@store');
    Route::post('brand/edit/{id}', 'BrandsController@store');
    Route::get('brand/delete/{id}', 'BrandsController@destroy');
});
