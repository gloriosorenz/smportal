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


Auth::routes();



// If user is authenticated
Route::group( ['middleware' => 'auth' ], function()
{
    // Profile
    Route::get('/profile', function () {
    return view('profile');
    });



    Route::resource('administrators', 'AdministratorsController');
    Route::resource('farmers', 'FarmersController');
    Route::resource('customers', 'CustomersController');
    Route::resource('roles', 'RolesController');
    Route::resource('seasons', 'SeasonsController');
    Route::resource('season_lists', 'SeasonListsController');
    Route::resource('product_lists', 'ProductListsController');

    // Route::resource('users', 'UsersController');

    Route::get('/home', 'HomeController@index')->name('home');

});


