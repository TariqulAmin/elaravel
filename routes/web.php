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
Route::get('/product_by_category/{id}','HomeController@show_product_by_category');
Route::get('/product_by_brand/{id}','HomeController@show_product_by_brand');
Route::get('/view-product/{id}','HomeController@product_detail');
Route::get('/search','HomeController@search');



//Cart Route

Route::post('/add-to-cart', 'CartController@add_to_cart');
Route::get('/show-cart', 'CartController@show_cart');
Route::get('/delete-item/{id}', 'CartController@delete_from_cart');
Route::patch('/update-item/{id}', 'CartController@update_item');

//Checkout

Route::get('/customer_login', 'CheckoutController@login')->middleware('customercheck');

Route::post('/customer-registration', 'CheckoutController@customer_registration');
Route::post('/customer_login_system', 'CheckoutController@customer_login');

Route::get('/checkout', 'CheckoutController@checkout')->middleware('shippingcheck');

Route::get('/customer_logut', 'CheckoutController@logout');
Route::post('/shipping-details', 'CheckoutController@shipping_details');

Route::get('/payment', 'CheckoutController@payment')->middleware('paymentcheck');

Route::post('/place-order', 'CheckoutController@place_order');

Route::get('/confirm-handcash',function(){

  return view('pages.confirm-handcash');

});

Route::get('/payment-stripe', 'CheckoutController@payment_stripe');


Route::post('/stripe-submission', 'CheckoutController@stripe_submission');

Route::get('/confirm-stripe',function(){

  return view('pages.confirm-stripe');

});





//Backend Route 



Route::get('/admin','AdminController@login_page');
Route::post('/login','AdminController@login');
Route::get('/dashboard','AdminController@show_dashboard')->middleware('adminauthcheck');
Route::get('/logout','AdminController@logout');

//Category Route............

Route::group(['middleware' => 'adminauthcheck'], function () {

  Route::get('/category/active/{id}','CategoryController@active');
  Route::get('/category/inactive/{id}','CategoryController@inactive');
  Route::resource('/category', 'CategoryController');
    
});



//Brand Route............

Route::group(['middleware' => 'adminauthcheck'], function () {

  Route::get('/brand/active/{id}','BrandController@active');
  Route::get('/brand/inactive/{id}','BrandController@inactive');
  Route::resource('/brand', 'BrandController');
    
});




//Product Route......

Route::group(['middleware' => 'adminauthcheck'], function () {
  
  Route::resource('/product', 'ProductController');
  Route::get('/product/active/{id}','ProductController@active');
  Route::get('/product/inactive/{id}','ProductController@inactive');
    
});



