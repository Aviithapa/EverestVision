<?php
/**
 * Created by PhpStorm.
 * User: Prabin Bajracharya
 * Date: 5/27/2018
 * Time: 8:16 PM
 */
Route::group(['namespace' => 'General'], function () {
    Route::get('change-password/{code}','HomeController@resetPasswordWithCode')->name('change-password');
    Route::post('change-password','HomeController@resetPasswordStore')->name('change-password.store');


//    Route::get('/', 'HomeController@index')->name('web.home.index');
//    Route::get('/{slug}','HomeController@slug')->name('web.pages.slug');

    Route::get('branch_staff/ajax','HomeController@getBranchStaff');
    Route::get('branch_goods/ajax','HomeController@getBranchGoods');
    Route::get('lang/{locale}', 'HomeController@lang');
    Route::get('notices/{slug}','HomeController@getNoticesType');
    Route::get('events/{slug}','HomeController@getEventsType');
    Route::get('feedback_form','HomeController@getfeedbackform');
    Route::post('feedback','HomeController@storeFeedbackData');
    Route::get('food-report','HomeController@foodReport');
    Route::get('event_detail/{slug}','HomeController@eventDetail');
    Route::get('food-report/query','HomeController@foodReportQuery');
    Route::get('food-report/get_type_value','HomeController@foodReportTypeValue');
    Route::match(['get', 'post'], '/{slug}', 'HomeController@slug')->where('slug', '.*');
});
