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

// Route::get('/', function () {
//     return view('website');
// });

Route::get('/','WebsiteController@index');


// Cart aand shop
Route::get('/shop','WebsiteController@shop')->name('shop');
Route::get('/cart', 'CartController@index')->name('cart.index');
Route::post('/cart','CartController@store')->name('cart.index');
Route::patch('/cart/{product}','CartController@update')->name('cart.update');
Route::delete('/cart/{product}', 'CartController@destroy')->name('cart.destroy');

// Weather Statistics
Route::get('/weather','WebsiteController@weather')->name('weather');

// Weather Statistics
Route::get('/contact','WebsiteController@contact')->name('contact');

// Route::get('/weather', function () {
//     return view('website.weather');
//     });


// Checkout
Route::get('/checkout', 'CheckoutController@index')->name('checkout.index')->middleware('auth');
Route::post('/checkout', 'CheckoutController@store')->name('checkout.store');
Route::get('/thankyou', 'ConfirmationController@index')->name('confirmation.index');

Auth::routes();

Route::get('website/view_order/{id}', 'WebsiteController@view_order');



// If user is authenticated
Route::group( ['middleware' => 'auth' ], function()
{
    // Notifications
    Route::get('/notifications', function () {
        return view('notifications');
        });

    Route::get('/markAsRead', function () {
            auth()->user()->unreadNotifications->markAsRead(); 
        });

    
    // Dynamic Modal
    // Route::get('dynamicModal/{id}',[
    //     'as'=>'dynamicModal',
    //     'uses'=> 'OrderProductsController@loadModal'
    // ]);
    Route::get('dynamicModal/{id}', 'OrderProductsController@loadModal')->name('dynamicModal');


    //Profile
    Route::get('profiles/index', 'ProfilesController@index')->name('profile');


    // Dashboard
    Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
    Route::get('/request_season', 'DashboardController@request_season');


    // PDF
    Route::get('pdf/damage_report/{id}', 'DamageReportsController@pdfview');
    Route::get('pdf/invoice/{id}', 'OrdersController@pdfview');
    Route::get('pdf/season_report/{id}', 'SeasonsController@pdfview');
    Route::get('pdf/sales_report/{id}', 'SalesReportsController@pdfview');
    Route::get('pdf/plant_report/{id}', 'PlantReportsController@pdfview');

    // Side Navbar Names
    Route::get('admin/seasons/index', 'SeasonsController@index')->name('seasons');
    Route::get('farmer/season_lists/index', 'SeasonListsController@index')->name('season_lists');
    Route::get('farmer/product_lists/index', 'ProductListsController@index')->name('product_lists');
    Route::get('admin/orders/index', 'OrdersController@index')->name('orders');
    Route::get('farmer/order_products/index', 'OrderProductsController@index')->name('order_products');


    // Orders
    Route::get('/website/my_orders', 'OrdersController@my_orders')->name('my_orders');

    Route::get('/orders/confirm_order/{id}', 'OrderController@confirm_order');
    Route::get('/orders/cancel_order/{id}', 'OrderController@cancel_order');

    // Order Products
    Route::get('/order_products/confirm_order/{id}', 'OrderProductsController@confirm_order');
    Route::get('/order_products/cancel_order/{id}', 'OrderProductsController@cancel_order');
    Route::get('/order_products/paid_order/{id}', 'OrderProductsController@paid_order');
    Route::get('/order_products/pending_order/{id}', 'OrderProductsController@pending_order');

    // Plant Report
    Route::get('reports/plant_reports/deactivateReport{id}','PlantReportsController@deactivateReport');
    Route::get('reports/plant_reports/addPlantReport','PlantReportsController@addPlantReport');
    Route::get('reports/plant_reports/plant_report_created', 'PlantReportsController@plant_report_created');

    
    Route::resource('administrators', 'AdministratorsController');
    Route::resource('farmers', 'FarmersController');
    Route::resource('customers', 'CustomersController');
    Route::resource('roles', 'RolesController');
    Route::resource('seasons', 'SeasonsController');
    Route::resource('season_lists', 'SeasonListsController');
    Route::resource('product_lists', 'ProductListsController');
    Route::resource('orders', 'OrdersController');
    Route::resource('order_products', 'OrderProductsController');
    Route::resource('damage_reports', 'DamageReportsController');
    Route::resource('plant_reports', 'PlantReportsController');
    Route::resource('sales_reports', 'SalesReportsController');
    Route::resource('profiles', 'ProfilesController');

    // Route::resource('dashboard', 'DashboardController');


    // Route::resource('users', 'UsersController');

    // Route::get('/dashboard', 'HomeController@index')->name('dashboard');

});


