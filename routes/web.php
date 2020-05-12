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

/* Дашборд */
Route::get('/admin', 'AdminController@dashboard')->name('admin_dashboard');

/* Врачи */
Route::get('/admin/med', 'AdminMedController@index')->name('admin_med');
Route::get('/admin/med/add', 'AdminMedController@add')->name('admin_med_add');
Route::post('/admin/med/add', 'AdminMedController@add')->name('admin_med_add');
Route::get('/admin/med/edit/{id}', 'AdminMedController@edit')->name('admin_med_edit');
Route::post('/admin/med/edit/{id}', 'AdminMedController@edit')->name('admin_med_edit');
Route::get('/admin/med/info/{id}', 'AdminMedController@info')->name('admin_med_info');

/* Специализации */
Route::get('/admin/spec', 'AdminSpecController@index')->name('admin_spec');
Route::get('/admin/spec/add', 'AdminSpecController@add')->name('admin_spec_add');
Route::post('/admin/spec/add', 'AdminSpecController@add')->name('admin_spec_add');
Route::get('/admin/spec/edit/{id}', 'AdminSpecController@edit')->name('admin_spec_edit');
Route::post('/admin/spec/edit/{id}', 'AdminSpecController@edit')->name('admin_spec_edit');

/* Клиники */
Route::get('/admin/clinic', 'AdminClinicController@index')->name('admin_clinic');
Route::get('/admin/clinic/add', 'AdminClinicController@add')->name('admin_clinic_add');
Route::post('/admin/clinic/add', 'AdminClinicController@add')->name('admin_clinic_add');
Route::get('/admin/clinic/edit/{id}', 'AdminClinicController@edit')->name('admin_clinic_edit');
Route::post('/admin/clinic/edit/{id}', 'AdminClinicController@edit')->name('admin_clinic_edit');
Route::get('/admin/clinic/info/{id}', 'AdminClinicController@info')->name('admin_clinic_info');

/* Пациенты */
Route::get('/admin/patient', 'AdminPatientController@index')->name('admin_patient');
Route::get('/admin/patient/add', 'AdminPatientController@add')->name('admin_patient_add');
Route::post('/admin/patient/add', 'AdminPatientController@add')->name('admin_patient_add');
Route::get('/admin/patient/edit/{id}', 'AdminPatientController@edit')->name('admin_patient_edit');
Route::post('/admin/patient/edit/{id}', 'AdminPatientController@edit')->name('admin_patient_edit');
Route::get('/admin/patient/info/{id}', 'AdminPatientController@info')->name('admin_patient_info');

/* Отзывы */
Route::get('/admin/reviews', 'AdminReviewController@index')->name('admin_reviews');
Route::get('/admin/reviews/add', 'AdminReviewController@add')->name('admin_reviews_add');
Route::post('/admin/reviews/add', 'AdminReviewController@add')->name('admin_reviews_add');
Route::get('/admin/reviews/edit/{id}', 'AdminReviewController@edit')->name('admin_reviews_edit');
Route::post('/admin/reviews/edit/{id}', 'AdminReviewController@edit')->name('admin_reviews_edit');

/* Недели */
Route::get('/admin/duration', 'AdminDurationController@index')->name('admin_dur');
Route::get('/admin/duration/add', 'AdminDurationController@add')->name('admin_dur_add');
Route::post('/admin/duration/add', 'AdminDurationController@add')->name('admin_dur_add');
Route::get('/admin/duration/edit/{id}', 'AdminDurationController@edit')->name('admin_dur_edit');
Route::post('/admin/duration/edit/{id}', 'AdminDurationController@edit')->name('admin_dur_edit');

/* Регионы */
Route::get('/admin/regions', 'AdminRegionController@index')->name('admin_regions');
Route::get('/admin/regions/add', 'AdminRegionController@add')->name('admin_regions_add');
Route::post('/admin/regions/add', 'AdminRegionController@add')->name('admin_regions_add');
Route::get('/admin/regions/edit/{id}', 'AdminRegionController@edit')->name('admin_regions_edit');
Route::post('/admin/regions/edit/{id}', 'AdminRegionController@edit')->name('admin_regions_edit');

/* Города */
Route::get('/admin/cities', 'AdminCityController@index')->name('admin_cities');
Route::get('/admin/cities/add', 'AdminCityController@add')->name('admin_cities_add');
Route::post('/admin/cities/add', 'AdminCityController@add')->name('admin_cities_add');
Route::get('/admin/cities/edit/{id}', 'AdminCityController@edit')->name('admin_cities_edit');
Route::post('/admin/cities/edit/{id}', 'AdminCityController@edit')->name('admin_cities_edit');

/* Новости */
Route::get('/admin/news', 'AdminContentController@index')->name('admin_news');
Route::get('/admin/news/add', 'AdminContentController@add')->name('admin_news_add');
Route::post('/admin/news/add', 'AdminContentController@add')->name('admin_news_add');
Route::get('/admin/news/edit/{id}', 'AdminContentController@edit')->name('admin_news_edit');
Route::post('/admin/news/edit/{id}', 'AdminContentController@edit')->name('admin_news_edit');

/* Статьи */
Route::get('/admin/articles', 'AdminContentController@index')->name('admin_arts');
Route::get('/admin/articles/add', 'AdminContentController@add')->name('admin_arts_add');
Route::post('/admin/articles/add', 'AdminContentController@add')->name('admin_arts_add');
Route::get('/admin/articles/edit/{id}', 'AdminContentController@edit')->name('admin_arts_edit');
Route::post('/admin/articles/edit/{id}', 'AdminContentController@edit')->name('admin_arts_edit');

/* Рекомендации */
Route::get('/admin/recs', 'AdminContentController@index')->name('admin_recs');
Route::get('/admin/recs/add', 'AdminContentController@add')->name('admin_recs_add');
Route::post('/admin/recs/add', 'AdminContentController@add')->name('admin_recs_add');
Route::get('/admin/recs/edit/{id}', 'AdminContentController@edit')->name('admin_recs_edit');
Route::post('/admin/recs/edit/{id}', 'AdminContentController@edit')->name('admin_recs_edit');

/* Документы */
Route::get('/admin/docs', 'AdminContentController@index')->name('admin_docs');
Route::get('/admin/docs/add', 'AdminContentController@add')->name('admin_docs_add');
Route::post('/admin/docs/add', 'AdminContentController@add')->name('admin_docs_add');
Route::get('/admin/docs/edit/{id}', 'AdminContentController@edit')->name('admin_docs_edit');
Route::post('/admin/docs/edit/{id}', 'AdminContentController@edit')->name('admin_docs_edit');

/* Чаты */
Route::get('/admin/msg', 'AdminMsgController@index')->name('admin_msg');
Route::get('/admin/msg/chat/{chat_id}', 'AdminMsgController@chat')->name('admin_chat');
Route::post('/admin/msg/chat/{chat_id}', 'AdminMsgController@add')->name('admin_msg_add');

/* Языки */
Route::get('/admin/langs', 'AdminLangController@index')->name('admin_langs');
Route::get('/admin/langs/add', 'AdminLangController@add')->name('admin_langs_add');
Route::post('/admin/langs/add', 'AdminLangController@add')->name('admin_langs_add');
Route::get('/admin/langs/edit/{id}', 'AdminLangController@edit')->name('admin_langs_edit');
Route::post('/admin/langs/edit/{id}', 'AdminLangController@edit')->name('admin_langs_edit');

/* API */
//Route::any('/api/login/doctor', 'ApiController@login_doctor');
//Route::any('/api/login/patient', 'ApiController@login_patient');
//Route::post('/api/signup/doctor/{step}', 'ApiController@signup_doctor');
//Route::post('/api/signup/patient/{step}', 'ApiController@signup_patient');
//Route::get('/api/profile', 'ApiController@get_profile');
//Route::post('/api/profile', 'ApiController@update_profile');
//Route::get('/api/get_regions', 'ApiController@get_regions');
//Route::get('/api/get_cities', 'ApiController@get_cities');
//Route::get('/api/get_durations', 'ApiController@get_durations');
//Route::get('/api/get_spec', 'ApiController@get_spec');
//Route::get('/api/get_clinics', 'ApiController@get_clinics');
//Route::get('/api/get_reviews', 'ApiController@get_reviews');
//Route::get('/api/get_news', 'ApiController@get_news');
//Route::get('/api/get_articles', 'ApiController@get_articles');
//Route::get('/api/get_recomendations', 'ApiController@get_recomendations');
//Route::get('/api/get_documents', 'ApiController@get_documents');
//Route::get('/api/doctor/info', 'ApiController@doctor_info');
//Route::get('/api/patient/info', 'ApiController@patient_info');
//Route::post('/api/add_review', 'ApiController@add_review');
//Route::post('/api/chat/start', 'ApiController@chat_start');
//Route::post('/api/chat/send', 'ApiController@chat_send');
//Route::get('/api/chat/updates', 'ApiController@chat_updates');
