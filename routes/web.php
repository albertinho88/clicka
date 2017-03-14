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

Route::get('login', 'SessionController@create')->name('login');
Route::post('login', 'SessionController@store');
Route::get('logout', 'SessionController@destroy');

Route::get('errors/no_menu_access',function(){
    return view('errors.no_menu_access');
});

Route::group(['middleware' => ['auth']], function () {

    Route::get('application','ApplicationController@principal')->name('application_principal');    
    
    Route::group(['middleware' => ['hasAccess']], function () {
        Route::get('application/management/menu_options','MenuOptionController@index')->name('index_menu_options');
        Route::get('application/management/menu_options/create','MenuOptionController@create')->name('create_menu_option');
        Route::post('application/management/menu_options/create','MenuOptionController@store')->name('store_menu_option');
        Route::get('application/management/menu_options/edit/{menu_id}','MenuOptionController@edit')->name('edit_menu_option');
        Route::get('application/management/menu_options/show/{menu_id}','MenuOptionController@show')->name('show_menu_option');
        
        Route::get('application/management/users','UserController@index')->name('index_users');         
        Route::get('application/management/users/create','UserController@create')->name('create_user');
        Route::post('application/management/users/create','UserController@store')->name('store_user');
        Route::get('application/management/users/edit/{user_id}','UserController@edit')->name('edit_user')->middleware('hasAccess');        
        Route::get('application/management/users/show/{user_id}','UserController@show')->name('show_user');

        Route::get('application/management/roles','RoleController@index')->name('index_roles');         
        Route::get('application/management/roles/create','RoleController@create')->name('create_role');
        Route::post('application/management/roles/create','RoleController@store')->name('store_role');
        Route::get('application/management/roles/edit/{role_id}','RoleController@edit')->name('edit_role');        
        Route::get('application/management/roles/show/{role_id}','RoleController@show')->name('show_role');        

        Route::get('application/management/services','ServiceController@index')->name('index_services');            
        Route::get('application/management/services/create','ServiceController@create')->name('create_service');
        Route::post('application/management/services/create','ServiceController@store')->name('store_service');
        Route::get('application/management/services/edit/{service_id}','ServiceController@edit')->name('edit_service');        
        Route::get('application/management/services/show/{service_id}','ServiceController@show')->name('show_service');
        
        Route::get('application/management/catalogs','CatalogController@index')->name('index_catalogs');            
        Route::get('application/management/catalogs/create','CatalogController@create')->name('create_catalog');
        Route::post('application/management/catalogs/create','CatalogController@store')->name('store_catalog');
        Route::get('application/management/catalogs/edit/{catalog_id}','CatalogController@edit')->name('edit_catalog');        
        Route::get('application/management/catalogs/show/{catalog_id}','CatalogController@show')->name('show_catalog');
        
        Route::get('application/management/media_files','MediaFileController@index')->name('index_media_files');        
        
    });
    
    Route::get('application/management/media_files/list_media_files_json','MediaFileController@listMediaFilesJson')->name('list_media_files_json')
            ->middleware('hasAccessOptional:application/management/media_files');
    Route::post('application/management/media_files/create_directory','MediaFileController@createDirectory')->name('create_directory')
            ->middleware('hasAccessOptional:application/management/media_files');      
    
    Route::get('application/management/menu_options/list_menu_options_json','MenuOptionController@listMenuOptionsJson')->name('list_menu_options_json')
                ->middleware('hasAccessOptional:application/management/menu_options');    
    Route::post('application/management/menu_options/update','MenuOptionController@update')->name('update_menu_option')
            ->middleware('hasAccessOptional:application/management/menu_options/edit/{menu_id}');    
    
    Route::get('application/management/users/list_users_json','UserController@listUsersJson')->name('list_users_json')
            ->middleware('hasAccessOptional:application/management/users');
    Route::post('application/management/users/update','UserController@update')->name('update_user')
            ->middleware('hasAccessOptional:application/management/users/edit/{user_id}');
    
    Route::get('application/management/roles/list_roles_json','RoleController@listRolesJson')->name('list_roles_json')
            ->middleware('hasAccessOptional:application/management/roles');
    Route::post('application/management/roles/update','RoleController@update')->name('update_role')
            ->middleware('hasAccessOptional:application/management/roles/edit/{role_id}');
    
    Route::get('application/management/services/list_services_json','ServiceController@listServicesJson')->name('list_services_json')
            ->middleware('hasAccessOptional:application/management/services');
    Route::post('application/management/services/update','ServiceController@update')->name('update_service')
            ->middleware('hasAccessOptional:application/management/services/edit/{service_id}');
    
    Route::get('application/management/catalogs/list_catalogs_json','CatalogController@listCatalogsJson')->name('list_catalogs_json')
		->middleware('hasAccessOptional:application/management/catalogs');
    Route::post('application/management/catalogs/update','CatalogController@update')->name('update_catalog')
                    ->middleware('hasAccessOptional:application/management/catalogs/edit/{catalog_id}');
    
    Route::get('application/management/catalogs/manage_detail/{catalog_id}','CatalogController@manageDetail')->name('manage_catalog_detail')
                    ->middleware('hasAccessOptional:application/management/catalogs');    
    Route::post('application/management/catalogs/store_catalog_details','CatalogController@storeCatalogDetails')->name('store_catalog_details')
                    ->middleware('hasAccessOptional:application/management/catalogs');    
    
});











