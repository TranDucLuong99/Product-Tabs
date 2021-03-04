<?php
///*
//header('Access-Control-Allow-Origin: *');
//header('Access-Control-Allow-Headers: Authorization, X-CSRF-Token, x-test-header, Origin, X-Requested-With, Content-Type, Accept' );
//header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS');
//*/
///*
//|--------------------------------------------------------------------------
//| Web Routes
//|--------------------------------------------------------------------------
//|
//| Here is where you can register web routes for your application. These
//| routes are loaded by the RouteServiceProvider within a group which
//| contains the "web" middleware group. Now create something great!
//|
//*/
//Proxy
Route::get('/', function () {
    return view('welcome');
});
Route::group(['middleware' => ['web']], function () {
    Route::post('/webhook/shop-redact', 'ProductreviewsController@shopRedact');
    Route::post('/webhook/customers-redact', 'ProductreviewsController@customersRedact');
    Route::post('/webhook/customers-data-request', 'ProductreviewsController@customersDataRequest');
    //payment declined.
    Route::get(
        '/declined',
        'ProductreviewsController@declined'
    )
        ->name('declined');
    //Plan controller
    Route::get('plan', 'PlanController@index')->name('plan');

    //User Guide
    Route::get(
        '/userguide',
        'ProductreviewsController@userguide'
    )
        ->name('userguide');

    Route::post('/publishToTheme', 'ProductreviewsController@publishToTheme')->name('publishToTheme');
    Route::get('/publishToTheme', function () {
        abort(404, 'Page not found');
    });

    //backend
    Route::get(
        '/product-tab',
        'NavbarController@index'
    )
        ->middleware(['auth.shop', 'billable'])
        ->name('home');
    Route::get('setting', 'SettingController@index')->name('setting.index');
    Route::get('setting/update', 'SettingController@update')->name('setting.update');
    Route::get('setting-ajax-modal', 'SettingController@ajax_modal')->name('setting.ajax_modal');
    Route::post('setting/store', 'SettingController@store')->name('setting.store');
    Route::get('add-js', 'SettingController@addScriptToTheme')->name('setting.add-script');
    Route::get('add-js1', 'SettingController@addScriptToTheme1')->name('setting.add-script1');
    Route::get('add-css', 'SettingController@addCssToTheme')->name('setting.add-script');

    Route::get('product-tab', 'NavbarController@index')->name('navbar.index');
    Route::get('navbar-ajax-modal', 'NavbarController@ajax_modal')->name('navbar.ajax_modal');
    Route::post('navbar/store', 'NavbarController@store')->name('navbar.store');
    Route::post('navbar/edit/{id}', 'NavbarController@update')->name('navbar.update');
    Route::get('navbar-ajax-edit-modal/{id}', 'NavbarController@ajax_edit_modal')->name('navbar.ajax_edit_modal');
    Route::get('navbar/delete/{id}', 'NavbarController@delete')->name('navbar.delete');

    Route::get('navbar/create','NavbarController@create')->name('create.navbar');
    Route::get('paginate-product-navbar-ajax', 'NavbarController@paginate_product_navbar_ajax')->name('paginate_product_navbar_ajax');
    Route::get('navbar/edit/{id}','NavbarController@edit')->name('edit.navbar');
    Route::get('navbar/show/{id}','NavbarController@show')->name('show.navbar');
    Route::get('addScriptNarbarToTheme','NavbarController@addScriptNarbarToTheme')->name('addScriptNarbarToTheme');
});
