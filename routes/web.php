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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::group(['prefix'=>'admin','middleware'=>'auth'],function(){
      Route::resource('/categories','AdminCategoryController');
      Route::resource('/customers','AdminCustomerController');
      Route::resource('/contacts','AdminContactController');
      Route::resource('/brands','AdminBrandController');
      Route::get('/banners/sample','AdminBannerController@sample');
      Route::resource('/banners','AdminBannerController');
      Route::resource('/pages','AdminPageController');
      Route::resource('/coupons','AdminCouponController');
      Route::resource('/products','AdminProductController');
      Route::resource('/customers/groups','AdminCustomerGroupController');
      
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
