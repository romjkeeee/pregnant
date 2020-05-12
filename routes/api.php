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
    Route::post('me', 'AuthController@me');

    Route::group(['prefix' => 'articles'], function () {
        Route::get('/category', 'ArticleCategoryController@index');
        Route::get('/', 'ArticleController@index');
        Route::get('/{id}', 'ArticleController@show');
    });

    Route::group(['prefix' => 'location', 'as' => 'location.'], function () {
        Route::get('regions', 'LocationController@regions');
        Route::get('cities', 'LocationController@cities');
    });

    Route::apiResource('doctors', 'DoctorController');
    Route::apiResource('specializations', 'SpecializationController');
    Route::apiResource('clinics', 'ClinicController');
    Route::apiResource('durations', 'DurationController');

    /** patient routes*/
    Route::apiResource('bellies', 'PatientBellyController');
    Route::apiResource('patients', 'PatientController');
    Route::apiResource('contractions', 'PatientContractionController');
});

Route::get('user/getUserList', 'UserApiController@getUserList');
Route::get('user/userAdd', 'UserApiController@userAdd');
Route::get('user/getGroupList', 'UserApiController@getGroupList');
Route::get('user/addGroup', 'UserApiController@addGroup');
Route::get('user/getEmpList', 'UserApiController@getEmpList');
Route::get('user/addEmp', 'UserApiController@addEmp');
Route::get('user/getPlayList', 'UserApiController@getPlayList');
Route::get('user/addPlayList', 'UserApiController@addPlayList');

Route::get('sound/getSoundList', 'SoundApiController@getSoundList');
Route::get('sound/addSoundList', 'addSoundList@getSoundList');

Route::get('course/getCourseList', 'CourseApiController@getCourseList');
Route::get('course/addCourse', 'CourseApiController@addCourse');

Route::get('coupon/getCouponList', 'CouponApiController@getCouponList');

Route::get('cat/getCateoryList', 'CatApiController@getCateoryList');

