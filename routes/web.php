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

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/**
 * Напутствие следующему.
 * Статьи Мой малыш сделаны на основе статей.
 * Чтобы они работали нужно добавить категорию Мой малыш и указть id этой категории в файлах.
 * Здесь уже ничего не поможет, поэтому пускай оно просто работает...
 */

Auth::routes();

Route::get('/', function () {
    return view('welcome');
});
Route::get('admin', function () {
    return redirect(\route('admin.users.index'));
})->name('admin.home');

Route::group(['middleware' => 'auth', 'prefix' => 'admin', 'namespace' => 'Admin', 'as' => 'admin.'], function () {
    /** users routes */
    Route::resource('users', 'UserController');
    /** patients routes */
    Route::group(['prefix' => 'patients', 'as' => 'patients.'], function () {
        Route::resource('weights', 'PatientWeightController');
        Route::resource('bellies', 'PatientBellyController');
        Route::resource('contractions', 'PatientContractionController');
        Route::resource('check-list', 'PatientCheckListController');
        Route::resource('emergency-contacts', 'PatientEmergencyContactController');
    });
    Route::resource('patients', 'PatientController');
    /** check lists routes */
    Route::group(['prefix' => 'check-lists', 'as' => 'check-lists.'], function () {
        Route::resource('tasks', 'CheckListTaskController');
    });
    Route::resource('check-lists', 'CheckListController');
    /** doctors routes */
    Route::group(['prefix' => 'doctors', 'as' => 'doctors.'], function () {
        Route::resource('educations', 'DoctorEducationController');
        Route::resource('reviews', 'DoctorReviewController');
    });
    Route::resource('doctors', 'DoctorController');
    /** clinics routes */
    Route::group(['prefix' => 'clinics', 'as' => 'clinics.'], function () {
        Route::resource('prices', 'ClinicPriceController');
        Route::resource('reviews', 'ClinicReviewsController');
        Route::resource('schedules', 'ClinicScheduleController');
        Route::resource('departments', 'ClinicDepartmentsController');
    });
    Route::resource('clinics', 'ClinicController');
    /** specialisations routes */
    Route::resource('specialisations', 'SpecialisationController');
    /** locations routes */
    Route::resource('regions', 'RegionController');
    Route::resource('cities', 'CityController');
    /** lang routes */
    Route::resource('languages', 'LangController');
    /** translate routes */
    Route::resource('translates', 'TranslateController');
    /** articles routes */
    Route::resource('articles', 'ArticleController');
    Route::resource('article-category', 'ArticleCategoryController');

    /** helper routes */
    Route::post('destroy', 'AdminController@destroy')->name('destroy');
    /** ajax preload routes */
    Route::group(['prefix' => 'preload', 'as' => 'preload.'], function () {
        Route::post('users', 'PreloadController@users')->name('users');
        Route::post('clinics', 'PreloadController@clinics')->name('clinics');
        Route::post('doctors', 'PreloadController@doctors')->name('doctors');
        Route::post('patients', 'PreloadController@patients')->name('patients');
        Route::post('cities', 'PreloadController@cities')->name('cities');
        Route::post('regions', 'PreloadController@regions')->name('regions');
        Route::post('check-list', 'PreloadController@checkList')->name('check-list');
        Route::post('specializations', 'PreloadController@specializations')->name('specializations');
        Route::post('languages', 'PreloadController@langs')->name('langs');
        Route::post('article-category', 'PreloadController@article_category')->name('article-category');
    });

    /** Orders */
    Route::resource('orders', 'OrderController');
    /** my baby routes */
    Route::resource('mybaby', 'MyBabyController');

    Route::resource('chat', 'ChatController');
    Route::resource('chat-council', 'ChatCouncilController');
    Route::resource('chat-forum', 'ChatForumController');

    /**
     * Tech
     */
    Route::resource('tech', 'TechController');

    /*Route::group(['prefix' => 'chat', 'as' => 'chat.'], function () {

    });*/
});

