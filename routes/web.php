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

Route::get('/', 'SiteController@viewPage')->name('home');

Route::get('service/{service_id}', 'SiteController@viewService');

Route::get('contact_us', 'SiteController@viewContactUsPage');
Route::post('contact_ajax', 'SiteController@contactAjax')->name('contact_ajax');
Route::get('contact_form_ajax', 'SiteController@getContactFormAjax')->name('contact_form_ajax');

Route::get('login', 'SessionController@create')->name('login');
Route::post('login', 'SessionController@store');
Route::get('logout', 'SessionController@destroy');

Route::get('page/{page_id}', 'SiteController@viewPage')->name('show_site_page');


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
        
        Route::get('application/cms/pages','PageController@index')->name('index_pages');
        Route::get('application/cms/pages/create','PageController@create')->name('create_page');
        Route::post('application/cms/pages/create','PageController@store')->name('store_page');
        Route::get('application/cms/pages/edit/{page_id}','PageController@edit')->name('edit_page');        
        Route::get('application/cms/pages/show/{page_id}','PageController@show')->name('show_page');
        
        Route::get('application/cms/sliders','SliderController@index')->name('index_sliders');
        Route::get('application/cms/sliders/create','SliderController@create')->name('create_slider');
        Route::post('application/cms/sliders/create','SliderController@store')->name('store_slider');
        Route::get('application/cms/sliders/edit/{slider_id}','SliderController@edit')->name('edit_slider');        
        Route::get('application/cms/sliders/show/{slider_id}','SliderController@show')->name('show_slider'); 
        
        Route::get('application/sales/sales_items','SalesItemController@index')->name('index_sales_items');
        Route::get('application/sales/sales_items/create','SalesItemController@create')->name('create_sales_item');
        Route::post('application/sales/sales_items/create','SalesItemController@store')->name('store_sales_item');
        Route::get('application/sales/sales_items/edit/{sales_item_id}','SalesItemController@edit')->name('edit_sales_item');        
        Route::get('application/sales/sales_items/show/{sales_item_id}','SalesItemController@show')->name('show_sales_item');
        
        Route::get('application/sales/item_types','ItemTypeController@index')->name('index_item_types');
        Route::get('application/sales/item_types/create','ItemTypeController@create')->name('create_item_type');
        Route::post('application/sales/item_types/create','ItemTypeController@store')->name('store_item_type');
        Route::get('application/sales/item_types/edit/{item_type_id}','ItemTypeController@edit')->name('edit_item_type');        
        Route::get('application/sales/item_types/show/{item_type_id}','ItemTypeController@show')->name('show_item_type'); 
        
        Route::get('application/sales/taxes','TaxController@index')->name('index_taxes');
        Route::get('application/sales/taxes/create','TaxController@create')->name('create_tax');
        Route::post('application/sales/taxes/create','TaxController@store')->name('store_tax');
        Route::get('application/sales/taxes/edit/{tax_id}','TaxController@edit')->name('edit_tax');        
        Route::get('application/sales/taxes/show/{tax_id}','TaxController@show')->name('show_tax');
        
        Route::get('application/sales/quotation/create','QuotationController@create')->name('create_quotation');
        Route::post('application/sales/quotation/create','QuotationController@store')->name('store_quotation');
        
    });
    
    Route::get('application/management/media_files/list_media_files_json','MediaFileController@listMediaFilesJson')->name('list_media_files_json')
            ->middleware('hasAccessOptional:application/management/media_files');
    Route::post('application/management/media_files/create_directory','MediaFileController@createDirectory')->name('create_directory')
            ->middleware('hasAccessOptional:application/management/media_files');
    Route::post('application/management/media_files/add_media_file','MediaFileController@addMediaFile')->name('add_media_file')
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
    
    Route::get('application/cms/pages/list_pages_json','PageController@listPagesJson')->name('list_pages_json')
		->middleware('hasAccessOptional:application/cms/pages');
    Route::post('application/cms/pages/update','PageController@update')->name('update_page')
            ->middleware('hasAccessOptional:application/cms/pages/edit/{page_id}');
    Route::get('application/cms/pages/list_media_slider_json','PageController@listMediaFilesJson')->name('list_media_page_json')
            ->middleware('hasAccessOptional:application/cms/pages');
    Route::get('application/cms/pages/view_image_selector','PageController@viewImageSelector')->name('view_image_selector')
            ->middleware('hasAccessOptional:application/cms/pages');

    Route::get('application/cms/sliders/list_sliders_json','SliderController@listSlidersJson')->name('list_sliders_json')
		->middleware('hasAccessOptional:application/cms/sliders');
    Route::get('application/cms/sliders/list_media_slider_json','SliderController@listMediaFilesJson')->name('list_media_slider_json')
            ->middleware('hasAccessOptional:application/cms/sliders');
    Route::post('application/cms/sliders/update','SliderController@update')->name('update_slider')
            ->middleware('hasAccessOptional:application/cms/sliders/edit/{slider_id}');
    
    Route::get('application/sales/sales_items/list_sales_items_json','SalesItemController@listSalesItemsJson')->name('list_sales_items_json')
		->middleware('hasAccessOptional:application/sales/sales_items');
    Route::post('application/sales/sales_items/update','SalesItemController@update')->name('update_sales_item')
                    ->middleware('hasAccessOptional:application/sales/sales_items/edit/{sales_item_id}');
    
    Route::get('application/sales/item_types/list_item_types_json','ItemTypeController@listItemTypesJson')->name('list_item_types_json')
		->middleware('hasAccessOptional:application/sales/item_types');
    Route::post('application/sales/item_types/update','ItemTypeController@update')->name('update_item_type')
                    ->middleware('hasAccessOptional:application/sales/item_types/edit/{item_type_id}'); 
    
    Route::get('application/sales/taxes/list_taxes_json','TaxController@listTaxesJson')->name('list_taxes_json')
            ->middleware('hasAccessOptional:application/sales/taxes');
    Route::post('application/sales/taxes/update','TaxController@update')->name('update_tax')
                                    ->middleware('hasAccessOptional:application/sales/taxes/edit/{tax_id}'); 
});











