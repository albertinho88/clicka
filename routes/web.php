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

Route::get('/', 'SiteController@viewHomePage')->name('home');
Route::get('about_us', 'SiteController@viewAboutUsPage');
Route::get('services', 'SiteController@viewServicesPage');
Route::get('contact_us', 'SiteController@viewContactUsPage');
Route::get('service/{service_id}', 'SiteController@viewService');
Route::post('contact', 'SiteController@contactUs');

//Auth::routes();
Route::get('login', 'SessionController@create')->name('login');
Route::post('login', 'SessionController@store');
Route::get('logout', 'SessionController@destroy');

Route::get('application','ApplicationController@principal');

Route::get('application/management/users/list','UserController@viewList')->name('list_users');
