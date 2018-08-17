<?php

/*
  |--------------------------------------------------------------------------
  | Web Routes
  |--------------------------------------------------------------------------
  |
  | This file is where you may define all of the routes that are handled
  | by your application. Just tell Laravel the URIs it should respond
  | to using a Closure or controller method. Build something great!
  |
 */


Auth::routes();


// front_end

Route::group(['namespace' => 'FrontEnd'], function() {

    //home page
    Route::get('/', 'HomeController@index')->name('front.index');
    //store
    Route::post('store', 'HomeController@storeOrder')->name('front.order');
    // city change
    Route::get('cities/{id}', 'HomeController@cities')->name('front.cities');  
   
   

});

//loging/logout
Route::group(['prefix' => 'admin-cpx'], function() {
    Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
    Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
});
//admin route
Route::group(['prefix' => 'admin-cpx', 'namespace' => 'Admin'], function() {
    Route::get('/', 'AdminController@index')->name('admin.dashboard');

    Route::get('/logout', 'AdminController@logout')->name('admin.logout');
    // change password
    Route::get('/changePassword', 'AdminController@changePassword')->name('admin.changePassword');
    Route::post('/changePass', 'AdminController@ChangePass')->name('admin.changePass');
    //setting
    Route::get('/setting', 'AdminController@setting')->name('admin.setting');
    Route::post('/setting', 'AdminController@updateSetting')->name('admin.setting.update');

    //
   

    //admins
    Route::get('/admins', 'AdminController@admins')->name('admins.admins');
    Route::get('admins/create', 'AdminController@addAdmin')->name('admins.create');
    Route::post('admins/store', 'AdminController@store')->name('admins.store');
    Route::get('admins/destroy/{admin}', 'AdminController@destroy')->name('admins.destroy');
    Route::get('admins/edit/{admin}', 'AdminController@editAdmin')->name('admins.edit');
    Route::post('admins/update/{admin}', 'AdminController@update')->name('admins.update');


    // orders
    Route::get('orders/', 'OrderController@orders')->name('admin.orders');
    Route::get('orders/destroy/{id}', 'OrderController@destroyOrder')->name('admins.orders.destroy');
    Route::get('orders/destroy', 'OrderController@destroyOrders')->name('admins.allorders.destroy');
    Route::get('reports/', 'OrderController@reports')->name('admin.reports');
    ///
  
});



Route::group(['namespace' => 'Admin'], function() {

    Route::resource('admin-cpx/cities', 'CityController');
    Route::resource('admin-cpx/areas', 'AreaController');
   Route::resource('admin-cpx/users', 'UserController');
 
    //////////////////////////////////////////////////////
});


