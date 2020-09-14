<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['namespace' => 'API', 'as' => 'api.'], function () {
    Route::post('login', 'AuthController@login');
    Route::post('logout', 'AuthController@logout');
    Route::post('register', 'AuthController@register');
    Route::post('verify', 'AuthController@verify');
    Route::post('refresh', 'AuthController@refresh');
    Route::get('send_sms', 'AuthController@send_sms');

    Route::group(['prefix' => 'me'], function () {
        Route::post('/', 'AuthController@me');
        Route::post('lang', 'AuthController@lang');
        Route::post('phone', 'AuthController@phone');
        Route::post('location', 'AuthController@location');
        Route::post('notification', 'AuthController@notification');
        Route::post('name', 'AuthController@name');
        Route::post('update_photo', 'AuthController@update_photo');
        Route::post('set_doctor', 'AuthController@setDoctor');
        Route::post('update_email', 'AuthController@updateEmail');
    });
    Route::group(['prefix' => 'articles'], function () {
        Route::get('/category', 'ArticleCategoryController@index');
        Route::get('/', 'ArticleController@index');
        Route::get('/{id}', 'ArticleController@show');
    });

    Route::group(['prefix' => 'emergency_contacts'], function () {
        Route::get('/', 'EmergencyContactController@index');
        Route::post('/', 'EmergencyContactController@store');
    });

    Route::group(['prefix' => 'location', 'as' => 'location.'], function () {
        Route::get('regions', 'LocationController@regions');
        Route::get('cities', 'LocationController@cities');
        Route::get('districts/{id}', 'LocationController@districts');
    });

    Route::group(['prefix' => 'duration-articles', 'as' => 'duration-articles.'], function () {
        Route::get('/', 'DurationArticlesController@index');
        Route::get('/{id}', 'DurationArticlesController@show');
    });

    /** chat routes */
    Route::group(['prefix' => 'chat', 'as' => 'chat.'], function () {
        Route::post('send', 'ChatController@send');
        Route::post('start', 'ChatController@start');
        Route::post('visible', 'ChatController@visible');
        Route::get('list', 'ChatController@list');
        Route::get('messages', 'ChatController@messages');
        Route::post('delete', 'ChatController@deleteChat');

        Route::post('start_group', 'ChatController@startGroup');
        Route::post('send_group', 'ChatController@sendGroup');
        Route::post('add_user_group', 'ChatController@addUserGroup');
        Route::get('list_messages_group', 'ChatController@groupMessages');
        Route::get('get_groups', 'ChatController@getGroups');
        Route::post('leave_group', 'ChatController@leaveGroup');
        Route::post('get_patients', 'ChatController@getChatPatients');
    });

    Route::group(['prefix' => 'orders', 'as' => 'order.'], function () {
        Route::get('list', 'OrderController@list');
        Route::get('get', 'OrderController@get');
    });

    /** translates routes */
    Route::apiResource('translates', 'TranslateController')->only(['index']);
    /** langs routes */
    Route::get('langs', 'LangController');

    /** patient routes */
    Route::apiResource('check-lists', 'CheckListController');
    Route::post('remember-task', 'CheckListController@remember');
    Route::delete('remember-task/{id}', 'CheckListController@destroy_remember');

    Route::get('bellies/last', 'PatientBellyController@last');
    Route::get('bellies/last/{id}', 'PatientBellyController@last');
    Route::apiResource('bellies', 'PatientBellyController');

    Route::apiResource('patient/weight', 'PatientWeightController');
    Route::apiResource('patients', 'PatientController');
    Route::post('patients/set-pregnancy-number', 'PatientController@pragnancyNumber');
    Route::post('patients/get-pregnancy-number', 'PatientController@getPragnancyNumber');
    Route::post('patients/set-pregnancy-patology', 'PatientController@pregnancyPatology');
    Route::post('patients/get-pregnancy-patology', 'PatientController@getPregnancyPatology');
    Route::post('patients/set-last-menstruation', 'PatientController@setLastMenstruation');
    Route::post('patients/set-clinic-accounting/{id}', 'PatientController@setClinicAccounting');
    Route::post('patients/up-to-weight', 'PatientController@updateUpToWeight');
    Route::post('patients/duration/{id}', 'PatientController@duration');

    Route::post('conception-date', 'PatientController@conceptionDate');
    Route::post('pregnant', 'PatientController@pregnant');
    Route::apiResource('contractions', 'PatientContractionController');
    Route::get('my-duration', 'DurationController@get_duration');
    Route::get('my-menstruation', 'PatientMenstruationController@index');
    Route::post('add-menstruation', 'PatientMenstruationController@info');

    /** doctor routes */
    Route::get('specializations/doctors', 'DoctorController@specialisationDoctors');
    Route::apiResource('doctors/reviews', 'DoctorReviewController');
    Route::apiResource('doctors/educations', 'DoctorEducationController');
    Route::apiResource('doctors', 'DoctorController');
    Route::post('doctors/patiens', 'PatientController@getPatiens');
    Route::post('doctors/get', 'PatientController@getDoctors');

    /** clinics routes */
    Route::apiResource('clinics/reviews', 'ClinicReviewController');
    Route::apiResource('clinics', 'ClinicController');
    Route::get('clinics-search', 'ClinicController@search');

    Route::apiResource('specializations', 'SpecializationController');
    Route::apiResource('durations', 'DurationController');

    Route::get('send_push', 'PushNotifyController@sendPush');

    Route::get('sliders', 'SliderController@index');

    /**
     * Tech
     */

    Route::post('/tech/create', 'TechController@create');
});


