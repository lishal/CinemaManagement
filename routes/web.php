<?php

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
    return view('cms');
});

Route::get('/aboutproject', function () {
    return view('aboutproject');
});

Route::get('/contactus', 'Contact@index');

Route::post('/contactus', 'Contact@mail');
Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');



Route::get('admin/home', 'AdminController@index');

Route::get('admin', 'Admin\LoginController@showLoginForm')->name('admin.login');
Route::post('admin', 'Admin\LoginController@login');
Route::post('admin-password/email', 'Admin\ForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
Route::get('admin-password/reset', 'Admin\ForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
Route::post('admin-password/reset', 'Admin\ResetPasswordController@reset')->name('admin.password.update');;
Route::get('admin-password/reset/{token}', 'Admin\ResetPasswordController@showResetForm')->name('admin.password.reset');

Route::get('/userlist','UserlistController@index');
Route::get('/deleteuser/{id}','UserlistController@delete');

Route::get('/paymentlist','PaymentlistController@paid');
Route::get('/bookinglist','PaymentlistController@notpaid');


//user
//route for movie for users
Route::get('/allmovies','UserController@movie');
Route::get('/selectedmovie/{id?}','UserController@selected');

//user booking

Route::get('booking/{id}','BookingController@booking');

// Book seat
Route::get('/seatselection/{id}/{movie_id}','BookingController@seat');
Route::post('/seatconfirm/{id}','BookingController@save');
Route::get('/myticket','BookingController@myticket');
Route::get('/payment/{id}','BookingController@payment');
Route::post('/details/{id}','BookingController@detail');
Route::get('/cancel/{id}','BookingController@cancel');


//MOVIE

Route::get('admin/movie','MovieController@index');
Route::get('admin/movie/add/{id?}','MovieController@add');
Route::post('/admin/addmovie','MovieController@save');
Route::get('admin/delete/{id}','MovieController@delete');
Route::get('admin/status/{id}','MovieController@status');

Route::get('/showtime','ShowController@index');
Route::get('/addshow','ShowController@add');
Route::post('/addshow/store','ShowController@store');
Route::get('/showtime/{id}','ShowController@delete');


Route::get('/userprofile','ProfileController@profile');
Route::POST('/profile', 'ProfileController@update_profile');
Route::POST('/update_password', 'ProfileController@update_password');