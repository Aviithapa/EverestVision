<?php
/**
 * Created by PhpStorm.
 * User: Saurav KC
 * Date: 3/25/2018
 * Time: 5:28 PM
 */

Route::get('/', 'DashBoardController@index')->name('dashboard.index');
Route::group(['namespace' => 'Menus'], function () {
    Route::post('menus/order','MenuController@orderDrag');
    Route::delete('menus/modalDelete','MenuController@modalDelete');

    Route::resource('menus', 'MenuController', [
        'names' => [
            'index' => 'dashboard.menus.index',
            'create' => 'dashboard.menus.create',
            'store' => 'dashboard.menus.store',
            'edit' => 'dashboard.menus.edit',
            'update' => 'dashboard.menus.update',
            'destroy' => 'dashboard.menus.destroy',
        ]
    ]);
});
Route::group(['namespace'=>'Settings'],function(){
    Route::resource('districts', 'DistrictController', [
        'names' => [
            'index' => 'dashboard.districts.index',
            'create' => 'dashboard.districts.create',
            'store' => 'dashboard.districts.store',
            'edit' => 'dashboard.districts.edit',
            'update' => 'dashboard.districts.update',
            'destroy' => 'dashboard.districts.destroy',
        ]
    ]);
    Route::resource('provinces', 'ProvinceController', [
        'names' => [
            'index' => 'dashboard.provinces.index',
            'create' => 'dashboard.provinces.create',
            'store' => 'dashboard.provinces.store',
            'edit' => 'dashboard.provinces.edit',
            'update' => 'dashboard.provinces.update',
            'destroy' => 'dashboard.provinces.destroy',
        ]
    ]);
    Route::post('branches/order','BranchController@orderDrag');
    Route::delete('branches/modalDelete','BranchController@modalDelete');
    Route::resource('branches', 'BranchController', [
        'names' => [
            'index' => 'dashboard.branches.index',
            'create' => 'dashboard.branches.create',
            'store' => 'dashboard.branches.store',
            'edit' => 'dashboard.branches.edit',
            'update' => 'dashboard.branches.update',
            'destroy' => 'dashboard.branches.destroy',
        ]
    ]);
    Route::resource('goods', 'GoodController', [
        'names' => [
            'index' => 'dashboard.goods.index',
            'create' => 'dashboard.goods.create',
            'store' => 'dashboard.goods.store',
            'edit' => 'dashboard.goods.edit',
            'update' => 'dashboard.goods.update',
            'destroy' => 'dashboard.goods.destroy',
        ]
    ]);
    Route::resource('good_prices', 'GoodPriceController', [
        'names' => [
            'index' => 'dashboard.good_prices.index',
            'create' => 'dashboard.good_prices.create',
            'store' => 'dashboard.good_prices.store',
            'edit' => 'dashboard.good_prices.edit',
            'update' => 'dashboard.good_prices.update',
            'destroy' => 'dashboard.good_prices.destroy',
        ]
    ]);
    Route::resource('designations', 'DesignationController', [
        'names' => [
            'index' => 'dashboard.designations.index',
            'create' => 'dashboard.designations.create',
            'store' => 'dashboard.designations.store',
            'edit' => 'dashboard.designations.edit',
            'update' => 'dashboard.designations.update',
            'destroy' => 'dashboard.designations.destroy',
        ]
    ]);
    Route::resource('good_management', 'GoodManagementController', [
        'names' => [
            'index' => 'dashboard.good_management.index',
            'create' => 'dashboard.good_management.create',
            'store' => 'dashboard.good_management.store',
            'edit' => 'dashboard.good_management.edit',
            'update' => 'dashboard.good_management.update',
            'destroy' => 'dashboard.good_management.destroy',
        ]
    ]);
    Route::resource('sales_stock', 'SalesStockController', [
        'names' => [
            'index' => 'dashboard.sales_stock.index',
            'create' => 'dashboard.sales_stock.create',
            'store' => 'dashboard.sales_stock.store',
            'edit' => 'dashboard.sales_stock.edit',
            'update' => 'dashboard.sales_stock.update',
            'destroy' => 'dashboard.sales_stock.destroy',
        ]
    ]);
    Route::resource('purchases', 'PurchasesController', [
        'names' => [
            'index' => 'dashboard.purchases.index',
            'create' => 'dashboard.purchases.create',
            'store' => 'dashboard.purchases.store',
            'edit' => 'dashboard.purchases.edit',
            'update' => 'dashboard.purchases.update',
            'destroy' => 'dashboard.purchases.destroy',
        ]
    ]);
    Route::resource('branchIntro', 'BranchIntroController', [
        'names' => [
            'index' => 'dashboard.branchIntro.index',
            'create' => 'dashboard.branchIntro.create',
            'store' => 'dashboard.branchIntro.store',
            'edit' => 'dashboard.branchIntro.edit',
            'update' => 'dashboard.branchIntro.update',
//            'destroy' => 'dashboard.branchIntro.destroy',
        ]
    ]);
    Route::resource('feedback', 'FeedbackController', [
        'names' => [
            'send' => 'dashboard.feedback.send',
            'index' => 'dashboard.feedback.index',
            'create' => 'dashboard.feedback.create',
            'edit' => 'dashboard.feedback.edit',
            'store' => 'dashboard.feedback.store',
            'update' => 'dashboard.feedback.update',
            'destroy' => 'dashboard.feedback.destroy',

        ]
    ]);
    Route::get('/ajax_user_branch','ProblemController@getBranchUser')->name('dashboard.ajax_user_branch');
    Route::resource('problem', 'ProblemController', [
        'names' => [
            'index' => 'dashboard.problem.index',
            'create' => 'dashboard.problem.create',
            'store' => 'dashboard.problem.store',
            'edit' => 'dashboard.problem.edit',
            'update' => 'dashboard.problem.update',
            'destroy' => 'dashboard.problem.destroy',
        ]
    ]);
    Route::resource('log_management', 'LogManagementController', [
        'names' => [
            'index' => 'dashboard.log_management.index',
            'create' => 'dashboard.log_management.create',
            'store' => 'dashboard.log_management.store',
            'edit' => 'dashboard.log_management.edit',
            'update' => 'dashboard.log_management.update',
            'destroy' => 'dashboard.log_management.destroy',
            'show' => 'dashboard.log_management.show',
        ]
    ]);
});