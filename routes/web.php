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
})->name('welcome');

Auth::routes(['verify' => true]);

Route::group(['prefix' => 'user', 'middleware' => 'auth'], function () {
    Route::get('home', 'HomeController@userHome')->name('user_home');

    Route::group(['prefix'  => 'rent'], function () {
        Route::get('/{id}', 'PeminjamanUserController@create_rent')->name('rentUser.create');
        Route::get('/', 'PeminjamanUserController@index')->name('rentUser.index');
        Route::get('/detail/{id}', 'PeminjamanUserController@show')->name('rentUser.show');
        Route::get('/{id}/bayar', 'PeminjamanUserController@bayar')->name('rentUser.bayar');
        Route::post('/', 'PeminjamanUserController@store_rent')->name('rentUser.store');
        Route::post('/{id}/bayar', 'PeminjamanUserController@konfirmasi')->name('rentUser.konfirmasi');
    });

    Route::resource('CustomerUser', 'CustomerUserController');
});

Route::group(['prefix' => 'admin', 'middleware' => 'is_admin'], function () {

    Route::get('dashboard', 'DashboardController@index')->name('adminDashboard');

    Route::get('rent/create', 'RentController@create_rent_admin')->name('create_rent_admin');
    Route::post('rent/create', 'RentController@store_rent_admin')->name('store_rent_admin');

    // Pending rent
    Route::get('rent/pending', 'RentController@index')->name('pending_index');
    Route::get('rent/pending/{id}', 'RentController@pending_show')->name('pending_show');
    Route::post('rent/pending', 'RentController@pending_update')->name('pending_update');
    Route::delete('rent/pending/{id}', 'RentController@pending_destroy')->name('pending_destroy');

    // on rent
    Route::get('rent/jalan', 'RentController@index')->name('rent_index');
    Route::get('rent/jalan/{id}', 'RentController@rent_show')->name('rent_show');
    Route::post('rent/jalan/{id}', 'RentController@rent_update')->name('rent_update');

    // Returned rent
    Route::get('rent/kembali', 'RentController@index')->name('return_index');
    Route::get('rent/kembali/{id}', 'RentController@rent_show')->name('return_info');

    // Checkout rent
    Route::get("rent/checkout/{id}", "RentController@checkout")->name("checkout_rent");

    // Car route
    Route::resource('car', 'CarController');

    // Driver route
    Route::resource('driver', 'DriverController');

    // Payment route
    Route::resource('payment', 'PaymentController');

    // Armada route
    Route::resource('armada', 'ArmadaController');

    // Customer route
    Route::resource('customer', 'CustomerController');

    // Read notifications
    Route::post('read/{id}', 'ReadNotificationController')->name('readNotification');
});