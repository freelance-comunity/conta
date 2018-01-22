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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('admin/viewcalendar', 'HomeController@calendar');
Route::get('admin/createEvent', 'HomeController@createEvent');

Route::group(['middleware' => ['web']], function () {
	Route::resource('admin/users', 'Admin\\UsersController');
  Route::get('admin/settings', 'Admin\\UsersController@profile');
  Route::post('admin/settings', 'Admin\\UsersController@updateProfile');
});
Route::group(['middleware' => ['web']], function () {
	Route::resource('admin/roles', 'Admin\\RolesController');
  Route::get('permisos', 'Admin\\RolesController@permisos');
});

Route::group(['middleware' => ['web']], function () {
	Route::resource('admin/people', 'Admin\\PeopleController');
});

Route::group(['middleware' => ['web']], function () {
	Route::resource('admin/pending', 'Admin\\PendingController');
  Route::get('terminatePending/{id}', 'Admin\\PendingController@terminatePending');
  Route::get('pdf/{id}', 'Admin\\PendingController@pdf');
});
Route::group(['middleware' => ['web']], function () {
	Route::resource('admin/tracing', 'Admin\\TracingController');
  Route::get('terminate/{id}', 'Admin\\TracingController@terminate');
});

Route::group(['middleware' => ['web']], function () {
	Route::resource('admin/calendar', 'Admin\\CalendarController');
});
