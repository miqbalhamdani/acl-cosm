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

// frontend
Route::get('/', 'FrontendController@index')->name('home');
Route::get('/products', 'FrontendController@list')->name('product-list');
Route::get('/products/{slug}', 'FrontendController@detail')->name('product-detail');

Route::get('/company-profile', 'FrontendController@companyProfile')->name('company-profile');
Route::get('/sertifikasi', 'FrontendController@sertifikat')->name('sertifikasi');
Route::get('/layanan', 'FrontendController@layanan')->name('layanan');
Route::get('/contact', 'FrontendController@contact')->name('contact');

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

    /*
    |--------------------------------------------------------------------------
    | CATEGORY
    |--------------------------------------------------------------------------
    */
    Route::get('category', 'CategoryController@index');
    Route::get('category/add', 'CategoryController@store');
    Route::post('category/add', 'CategoryController@store');
    Route::get('category/edit/{id}', 'CategoryController@store');
    Route::post('category/edit/{id}', 'CategoryController@store');
    Route::get('category/delete/{id}', 'CategoryController@destroy');

    /*
    |--------------------------------------------------------------------------
    | PRODUCT
    |--------------------------------------------------------------------------
    */
    Route::get('product', 'ProductController@index');
    Route::get('product/add', 'ProductController@store');
    Route::post('product/add', 'ProductController@store');
    Route::get('product/edit/{id}', 'ProductController@store');
    Route::post('product/edit/{id}', 'ProductController@store');
    Route::get('product/delete/{id}', 'ProductController@destroy');

    // Upload image by Dropzone
    Route::post('product/images/upload', 'ProductController@uploadImage');
    Route::post('product/images/remove', 'ProductController@removeImage');

});
