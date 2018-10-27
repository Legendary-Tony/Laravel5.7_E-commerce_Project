<?php

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

Route::get('/', 'MainController@index')->name('home.page');
Route::get('/about_us', 'MainController@about_us')->name('about.us');
Route::get('/contact_us', 'MainController@contact_us')->name('contact.us');
Route::get('/profile', 'HomeController@index')->name('profile');
Route::delete('/profile/{id}', 'HomeController@delete')->name('profile.delete');

Route::get('/shop', 'ProductController@index')->name('products');
Route::get('/shop/{id}', 'ProductController@show')->name('products.show');

//CART ITEMS
Route::get('/cart', 'CartController@index')->name('cart.index');
//Route::post('/cart{product_id}', 'CartController@add')->name('cart.store');
Route::post('/cart/{id}', 'CartController@AddToCart')->name('cart.store');
Route::get('/reduce/{id}', 'CartController@getReduceByOne')->name('cart.reduce');
Route::get('/remove/{id}', 'CartController@getRemoveItems')->name('cart.remove');

//CHECK OUT
Route::get('/checkout', 'CheckoutController@getIndex')->name('checkout')->middleware('auth');
Route::post('/checkout', 'CheckoutController@postCheckout')->name('postCheckout')->middleware('auth');
Route::get('/thankyou', 'CheckoutController@thankyou')->name('thankyou')->middleware('auth');

//COUPON ROUTE
Route::post('/coupon', 'CouponController@couponStore')->name('coupon.store');
Route::delete('/coupon', 'CouponController@couponDelete')->name('coupon.delete');



Auth::routes();


