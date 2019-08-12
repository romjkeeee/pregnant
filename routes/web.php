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

/* Удаление записей */
Route::get('/admin/delete_record/{table}/{id}', 'AdminController@delete')->name('admin_delete'); 

Route::get('/admin', 'AdminUsersController@dash')->name('admin_main');
Route::post('/admin/ava', 'AdminUsersController@change_ava')->name('admin_main1');

/* Корзина */
Route::get('/admin/trash', 'AdminTrashController@index')->name('admin_trash');
Route::get('/admin/trash/restore/{table}/{id}', 'AdminTrashController@restore');
Route::get('/admin/trash/delete/{table}/{id}', 'AdminTrashController@delete');

Route::get('/admin/deletefg/{id}/{user_id}', 'AdminUsersController@deletefg');

/* Пользователи */
Route::get('/admin/users', 'AdminUsersController@index')->name('admin_users');
Route::get('/admin/users/add', 'AdminUsersController@add')->name('admin_uadd'); 
Route::post('/admin/users/add', 'AdminUsersController@add')->name('admin_uadd');
Route::get('/admin/users/edit/{id}', 'AdminUsersController@edit')->name('admin_uedit');
Route::post('/admin/users/edit/{id}', 'AdminUsersController@edit')->name('admin_uedit');
Route::get('/admin/users/info/{id}', 'AdminUsersController@info')->name('admin_uedit1');

/* Объявления */
Route::get('/admin/ads', 'AdminAdsController@index')->name('admin_ads');
Route::get('/admin/ads/add', 'AdminAdsController@add')->name('admin_aadd'); 
Route::post('/admin/ads/add', 'AdminAdsController@add')->name('admin_aadd');
Route::get('/admin/ads/edit/{id}', 'AdminAdsController@edit')->name('admin_aedit');
Route::post('/admin/ads/edit/{id}', 'AdminAdsController@edit')->name('admin_aedit');

/* Рубрики */
Route::get('/admin/cats', 'AdminCatsController@index')->name('admin_cats');
Route::get('/admin/cats/add', 'AdminCatsController@add')->name('admin_cadd'); 
Route::post('/admin/cats/add', 'AdminCatsController@add')->name('admin_cadd');
Route::get('/admin/cats/edit/{id}', 'AdminCatsController@edit')->name('admin_cedit');
Route::post('/admin/cats/edit/{id}', 'AdminCatsController@edit')->name('admin_cedit');
Route::get('/admin/cats/info/{id}', 'AdminCatsController@info')->name('admin_cinfo');

/* Платежи */
Route::get('/admin/payments', 'AdminPaymentsController@index')->name('admin_payments');

/* Настройки */
Route::get('/admin/settings', 'AdminController@settings')->name('admin_settings');
Route::post('/admin/settings', 'AdminController@settings')->name('admin_settings');

/* Языки */
Route::get('/admin/langs', 'AdminController@langs')->name('admin_langs');
Route::get('/admin/langs/add', 'AdminController@add')->name('admin_ladd'); 
Route::post('/admin/langs/add', 'AdminController@add')->name('admin_ladd');
Route::get('/admin/langs/edit/{id}', 'AdminController@edit')->name('admin_ledit');
Route::post('/admin/langs/edit/{id}', 'AdminController@edit')->name('admin_ledit');