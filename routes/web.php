<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;



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
    //return view('welcome');
    return view('main');
});


Route::resource('order', 'OrderController');


Route::prefix('admin')->namespace('Auth\Admin')->group(function(){
    //Authentication Routes for Admin........
    Route::get('login', 'LoginController@showLoginForm')->name('admin.login');
    Route::post('login', 'LoginController@login');
    // Route::get('logout', 'LoginController@logout')->name('admin.logout');
    Route::post('logout', 'LoginController@logout')->name('admin.logout');

    // Forget Password Route For Admins.
    Route::get('password/reset', 'ForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
    Route::post('password/email', 'ForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
    Route::get('password/reset/{token}', 'ResetPasswordController@showResetForm')->name('admin.password.reset');
    Route::post('password/reset', 'ResetPasswordController@reset')->name('admin.password.update');
});

Route::prefix('admin')->namespace('Admin')->group(function(){
    Route::get('dashboard', 'DashboardController@index')->name('admin.dashboard');
    Route::get('customers', 'DashboardController@customerlist')->name('admin.customers');
    Route::get('products', 'DashboardController@productlist')->name('admin.product');
    Route::get('order', 'DashboardController@search')->name('admin.order');
    Route::get('{id}', 'DashboardController@customerdetail')->name('admin.customerdetail');
    Route::post('{id}', 'DashboardController@customerdelete')->name('admin.customerdelete');
    
    
});

Route::prefix('user')->namespace('User')->group(function(){
    Route::get('dashboard', 'DashboardController@index')->name('user.dashboard');
    Route::get('settings', 'DashboardController@setting')->name('user.settings');
    Route::post('{id}', 'DashboardController@accountupdate')->name('user.update');
    Route::get('order', 'DashboardController@search')->name('user.order');
});


Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');


Route::get('/activate/{code}', 'ActivationController@activation')->name('user.activation');           // Yo chai Route Model Binding garna use vako route ho

Route::get('/resend/code', 'ActivationController@coderesend')->name('code.resend');