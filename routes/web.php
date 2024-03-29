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

Route::get('/shop','WebsiteController@shop')->name('shop');
Route::get('/cart', 'CartController@index')->name('cart');
Route::post('/cart','CartController@store')->name('cart');
Route::patch('/cart/{product}','CartController@update')->name('cart.update');
Route::delete('/cart/{product}', 'CartController@destroy')->name('cart.destroy');

// Checkout
Route::get('/checkout', 'CheckoutController@index')->name('checkout.index')->middleware('auth');
Route::post('/checkout', 'CheckoutController@store')->name('checkout.store');


Auth::routes();

// If user is authenticated
Route::group( ['middleware' => 'auth' ], function()
{
    // Profile
    Route::get('/profile', function () {
    return view('profile');
    });

    // Side Navbar Names
    Route::get('admin/seasons/index', 'SeasonsController@index')->name('seasons');
    Route::get('farmer/season_lists/index', 'SeasonListsController@index')->name('season_lists');
    Route::get('admin/orders/index', 'OrdersController@index')->name('orders');
    Route::get('farmer/order_products/index', 'OrderProductsController@index')->name('order_products');



    // Order Products
    Route::get('/order_products/confirm_order/{id}', 'OrderProductsController@confirm_order');
    Route::get('/order_products/cancel_order/{id}', 'OrderProductsController@cancel_order');
    Route::get('/order_products/paid_order/{id}', 'OrderProductsController@paid_order');
    Route::get('/order_products/pending_order/{id}', 'OrderProductsController@pending_order');

    
    Route::resource('administrators', 'AdministratorsController');
    Route::resource('farmers', 'FarmersController');
    Route::resource('customers', 'CustomersController');
    Route::resource('roles', 'RolesController');
    Route::resource('seasons', 'SeasonsController');
    Route::resource('season_lists', 'SeasonListsController');
    Route::resource('product_lists', 'ProductListsController');
    Route::resource('orders', 'OrdersController');
    Route::resource('order_products', 'OrderProductsController');

    // Route::resource('users', 'UsersController');

    Route::get('/home', 'HomeController@index')->name('home');

});


