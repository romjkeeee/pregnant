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

    Route::group(['prefix' => 'me'], function () {
        Route::post('/', 'AuthController@me');
        Route::post('lang', 'AuthController@lang');
        Route::post('phone', 'AuthController@phone');
        Route::post('location', 'AuthController@location');
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

    /** patient routes */
    Route::apiResource('check-lists', 'CheckListController');

    Route::get('bellies/last', 'PatientBellyController@last');
    Route::apiResource('bellies', 'PatientBellyController');

    Route::apiResource('patient/weight', 'PatientWeightController');
    Route::apiResource('patients', 'PatientController');

    Route::post('conception-date', 'PatientController@conceptionDate');
    Route::apiResource('contractions', 'PatientContractionController');
    Route::get('my-duration', 'DurationController@get_duration');

    /** doctor routes */
    Route::get('specializations/doctors', 'DoctorController@specialisationDoctors');
    Route::apiResource('doctors/reviews', 'DoctorReviewController');
    Route::apiResource('doctors', 'DoctorController');

    /** clinics routes */
    Route::apiResource('clinics/reviews', 'ClinicReviewController');
    Route::apiResource('clinics', 'ClinicController');

    Route::apiResource('specializations', 'SpecializationController');
    Route::apiResource('durations', 'DurationController');
});
Route::post('chat/start', 'ApiController@chat_start');
Route::post('chat/send', 'ApiController@chat_send');
Route::get('chat/updates', 'ApiController@chat_updates');
//
//Route::get('user/getUserList', 'UserApiController@getUserList');
//Route::get('user/userAdd', 'UserApiController@userAdd');
//Route::get('user/getGroupList', 'UserApiController@getGroupList');
//Route::get('user/addGroup', 'UserApiController@addGroup');
//Route::get('user/getEmpList', 'UserApiController@getEmpList');
//Route::get('user/addEmp', 'UserApiController@addEmp');
//Route::get('user/getPlayList', 'UserApiController@getPlayList');
//Route::get('user/addPlayList', 'UserApiController@addPlayList');
//
//Route::get('sound/getSoundList', 'SoundApiController@getSoundList');
//Route::get('sound/addSoundList', 'addSoundList@getSoundList');
//
//Route::get('course/getCourseList', 'CourseApiController@getCourseList');
//Route::get('course/addCourse', 'CourseApiController@addCourse');
//
//Route::get('coupon/getCouponList', 'CouponApiController@getCouponList');
//
//Route::get('cat/getCateoryList', 'CatApiController@getCateoryList');


