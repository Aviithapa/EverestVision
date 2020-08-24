<?php
/**
 * Created by PhpStorm.
 * User: Saurav KC
 * Date: 3/10/2018
 * Time: 5:31 PM
 */


Route::group(['prefix' => 'dashboard/ajax', 'namespace' => 'Admin', 'middleware' => 'auth'], function () {
    Route::post('/common-file-upload/{id?}', 'BaseController@commonFileUpload')
        ->name('dashboard.ajax.common-file-upload'); //FOR CREATE
    Route::put('/common-file-upload/{id?}', 'BaseController@commonFileUpload')
        ->name('dashboard.ajax.common-file-upload'); //FOR CREATE
    Route::post('/file-upload/{id?}', 'BaseController@fileUpload')
        ->name('dashboard.ajax.file-upload'); //FOR CREATE

    Route::put('/file-upload/{id?}', 'BaseController@fileUpload')
        ->name('dashboard.ajax.file-upload'); //FOR UPDATE

    Route::post('/any-file-upload/{id?}', 'BaseController@anyFileUpload')
        ->name('dashboard.ajax.any-file-upload'); //FOR CREATE
    Route::put('/any-file-upload/{id?}', 'BaseController@anyFileUpload')
        ->name('dashboard.ajax.any-file-upload'); //FOR UPDATE
    Route::put('/remove-img/{id?}', 'BaseController@removeUpload')
        ->name('dashboard.ajax.remove-img'); //FOR REMOVE
});

Route::group(['prefix' => 'web/ajax', 'namespace' => 'Web'], function () {
    Route::post('/file-upload/{id?}', 'BaseController@fileUpload')
        ->name('dashboard.ajax.file-upload'); //FOR CREATE
    Route::put('/file-upload/{id?}', 'BaseController@fileUpload')
        ->name('dashboard.ajax.file-upload'); //FOR UPDATE

    Route::post('/any-file-upload/{id?}', 'BaseController@anyFileUpload')
        ->name('dashboard.ajax.any-file-upload'); //FOR CREATE
    Route::put('/any-file-upload/{id?}', 'BaseController@anyFileUpload')
        ->name('dashboard.ajax.any-file-upload'); //FOR UPDATE
});