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

Route::get('/verifyEmailFirst', 'Auth\RegisterController@verifyEmailFirst')->name('verifyEmailFirst');

Route::get('/activationLink/{email}/{verifyToken}', 'Auth\RegisterController@activationLink')->name('activationLink');


Route::group(['prefix' => 'admin'], function() {

  Route::get('home', 'AdminController@index')->name('admin.home');
  Route::get('editor', 'AdminController@editor')->name('admin.editor');
  Route::get('both-roles', 'AdminController@bothRoles')->name('admin.bothRoles');

  // Authentication Routes...
  Route::get('login', 'Admin\LoginController@showLoginForm')->name('admin.login');
  Route::post('login', 'Admin\LoginController@login');
  Route::post('logout', 'Admin\LoginController@logout')->name('admin.logout');

  // Registration Routes...
  Route::get('register', 'Admin\RegisterController@showRegistrationForm')->name('admin.register');
  Route::post('register', 'Admin\RegisterController@register');

  // Password Reset Routes...
  Route::get('password/reset', 'Admin\ForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
  Route::post('password/email', 'Admin\ForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
  Route::get('password/reset/{token}', 'Admin\ResetPasswordController@showResetForm')->name('admin.password.reset');
  Route::post('password/reset', 'Admin\ResetPasswordController@reset');
});

// Route::get('/home', 'UserController@home')->name('home');

// Route::get('/register', 'UserController@getSignup')->name('register');
// Route::post('/register', 'UserController@postSignup')->name('register');

// Route::get('/login', 'UserController@getSignin')->name('login');
// Route::post('/login', 'UserController@postSignin')->name('login');

// Route::get('/logout', 'UserController@getLogout')->name('logout');

// Route::get('/password/reset', 'UserController@showLinkRequestForm')->name('reset');
// Route::get('/password/email', 'UserController@sendResetLinkEmail')->name('reset.email');

// Route::get('/password/reset/{token}', 'UserController@showResetForm')->name('resetForm');
// Route::post('/password/reset', 'UserController@reset');
