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
Route::get('services', 'SiteController@viewServicesPage')->name('services');
Route::get('contact_us', 'SiteController@viewContactUsPage');
Route::get('service/{service_id}', 'SiteController@viewService');
Route::post('contact', 'SiteController@contactUs');

//Auth::routes();
Route::get('login', 'SessionController@create')->name('login');
Route::post('login', 'SessionController@store');
Route::get('logout', 'SessionController@destroy');

Route::get('application','ApplicationController@principal');

Route::get('application/management/users','UserController@index')->name('list_users');
Route::get('application/management/users/getUsersJsonList','UserController@getUsersJsonList')->name('get_users_json');
Route::get('application/management/users/create','UserController@create')->name('create_user');
Route::get('application/management/users/edit/{user_id}','UserController@edit')->name('edit_user');
Route::get('application/management/users/show/{user_id}','UserController@show')->name('show_user');

Route::get('application/management/roles','RoleController@index')->name('list_roles');
Route::get('application/management/roles/getRolesJsonList','RoleController@getRolesJsonList')->name('get_roles_json');
Route::get('application/management/roles/create','RoleController@create')->name('create_role');
