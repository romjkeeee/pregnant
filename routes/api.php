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
    });

    Route::group(['prefix' => 'duration-articles', 'as' => 'duration-articles.'], function () {
        Route::get('/', 'DurationArticlesController@index');
        Route::get('/{id}', 'DurationArticlesController@show');
    });

    /** chat routes */
    Route::group(['prefix' => 'chat', 'as' => 'chat.'], function () {
        Route::post('send', 'ChatController@send');
        Route::post('start', 'ChatController@start');
        Route::get('list', 'ChatController@list');
        Route::get('messages', 'ChatController@messages');
    });

    /** translates routes */
    Route::apiResource('translates', 'TranslateController')->only(['index']);
    /** langs routes */
    Route::get('langs', 'LangController');

    /** patient routes */
    Route::apiResource('check-lists', 'CheckListController');

    Route::get('bellies/last', 'PatientBellyController@last');
    Route::apiResource('bellies', 'PatientBellyController');

    Route::apiResource('patient/weight', 'PatientWeightController');
    Route::apiResource('patients', 'PatientController');

    Route::post('conception-date', 'PatientController@conceptionDate');
    Route::apiResource('contractions', 'PatientContractionController');
    Route::get('my-duration', 'DurationController@get_duration');
    Route::get('my-menstruation', 'PatientMenstruationController@index');
    Route::get('add-menstruation', 'PatientMenstruationController@info');

    /** doctor routes */
    Route::get('specializations/doctors', 'DoctorController@specialisationDoctors');
    Route::apiResource('doctors/reviews', 'DoctorReviewController');
    Route::apiResource('doctors/educations', 'DoctorEducationController');
    Route::apiResource('doctors', 'DoctorController');
    Route::post('doctors/patiens', 'PatientController@getPatiens');

    /** clinics routes */
    Route::apiResource('clinics/reviews', 'ClinicReviewController');
    Route::apiResource('clinics', 'ClinicController');

    Route::apiResource('specializations', 'SpecializationController');
    Route::apiResource('durations', 'DurationController');
});


