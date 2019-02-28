<?php

use App\Http\Controllers\HomeController;

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

//Frontend Route

Route::get('/','HomeController@index');





//Backend Route 

Route::get('/logout','SuperAdminController@logout');

Route::get('/admin','AdminController@index');

Route::get('/dashboard','AdminController@show_dashboard');

Route::post('/admin-dashboard','AdminController@dashboard');

//Category Route............

Route::get('/category/active/{id}','CategoryController@active');
Route::get('/category/inactive/{id}','CategoryController@inactive');
Route::resource('/category', 'CategoryController');

//Brand Route............


Route::get('/brand/active/{id}','BrandController@active');
Route::get('/brand/inactive/{id}','BrandController@inactive');
Route::resource('/brand', 'BrandController');

//Product Route......

Route::resource('/product', 'ProductController');


