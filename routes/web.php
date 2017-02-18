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
Route::get('service/{service_id}', 'SiteController@viewService');

Route::get('contact_us', 'SiteController@viewContactUsPage');
Route::post('contact_ajax', 'SiteController@contactAjax')->name('contact_ajax');
Route::get('contact_form_ajax', 'SiteController@getContactFormAjax')->name('contact_form_ajax');

//Auth::routes();
Route::get('login', 'SessionController@create')->name('login');
Route::post('login', 'SessionController@store');
Route::get('logout', 'SessionController@destroy');

Route::get('application','ApplicationController@principal');

Route::get('application/management/users','UserController@index')->name('index_users');
Route::get('application/management/users/list_users_json','UserController@listUsersJson')->name('list_users_json');
Route::get('application/management/users/create','UserController@create')->name('create_user');
Route::post('application/management/users/create','UserController@store')->name('store_user');
Route::get('application/management/users/edit/{user_id}','UserController@edit')->name('edit_user');
Route::post('application/management/users/update','UserController@update')->name('update_user');
Route::get('application/management/users/show/{user_id}','UserController@show')->name('show_user');

Route::get('application/management/roles','RoleController@index')->name('index_roles');
Route::get('application/management/roles/list_roles_json','RoleController@listRolesJson')->name('list_roles_json');
Route::get('application/management/roles/create','RoleController@create')->name('create_role');
Route::post('application/management/roles/create','RoleController@store')->name('store_role');
Route::get('application/management/roles/edit/{role_id}','RoleController@edit')->name('edit_role');
Route::post('application/management/roles/update','RoleController@update')->name('update_role');
Route::get('application/management/roles/show/{role_id}','RoleController@show')->name('show_role');


