<?php
/**
 * Created by PhpStorm.
 * User: Saurav KC
 * Date: 3/25/2018
 * Time: 5:28 PM
 */


Route::group(['namespace' => 'WebSite'], function () {

    Route::resource('sliders', 'SliderController', [
        'names' => [
            'index' => 'dashboard.sliders.index',
            'create' => 'dashboard.sliders.create',
            'store' => 'dashboard.sliders.store',
            'show' => 'dashboard.sliders.show',
            'update' => 'dashboard.sliders.update',
            'edit' => 'dashboard.sliders.edit',
            'destroy' => 'dashboard.sliders.destroy',
        ]
    ]);
    Route::resource('products', 'ProductController', [
        'names' => [
            'index' => 'dashboard.products.index',
            'create' => 'dashboard.products.create',
            'store' => 'dashboard.products.store',
            'show' => 'dashboard.products.show',
            'update' => 'dashboard.products.update',
            'edit' => 'dashboard.products.edit',
            'destroy' => 'dashboard.products.destroy',
        ]
    ]);

    Route::resource('posts', 'PostController', [
        'names' => [
            'index' => 'dashboard.posts.index',
            'create' => 'dashboard.posts.create',
            'store' => 'dashboard.posts.store',
            'edit' => 'dashboard.posts.edit',
            'update' => 'dashboard.posts.update',
            'destroy' => 'dashboard.posts.destroy',
        ]
    ]);

    Route::resource('banners', 'BannerController', [
        'names' => [
            'index' => 'dashboard.banners.index',
            'create' => 'dashboard.banners.create',
            'store' => 'dashboard.banners.store',
            'edit' => 'dashboard.banners.edit',
            'update' => 'dashboard.banners.update',
            'destroy' => 'dashboard.banners.destroy',
        ]
    ]);
    Route::resource('teachers', 'TeacherController', [
        'names' => [
            'index' => 'dashboard.teachers.index',
            'create' => 'dashboard.teachers.create',
            'store' => 'dashboard.teachers.store',
            'edit' => 'dashboard.teachers.edit',
            'update' => 'dashboard.teachers.update',
            'destroy' => 'dashboard.teachers.destroy',
        ]
    ]);
    Route::resource('courses', 'CourseController', [
        'names' => [
            'index' => 'dashboard.courses.index',
            'create' => 'dashboard.courses.create',
            'store' => 'dashboard.courses.store',
            'edit' => 'dashboard.courses.edit',
            'update' => 'dashboard.courses.update',
            'destroy' => 'dashboard.courses.destroy',
        ]
    ]);
    Route::resource('packages', 'PackageController', [
        'names' => [
            'index' => 'dashboard.packages.index',
            'create' => 'dashboard.packages.create',
            'store' => 'dashboard.packages.store',
            'edit' => 'dashboard.packages.edit',
            'update' => 'dashboard.packages.update',
            'destroy' => 'dashboard.packages.destroy',
        ]
    ]);
    Route::resource('pages', 'PagesController', [
        'names' => [
            'index' => 'dashboard.pages.index',
            'create' => 'dashboard.pages.create',
            'store' => 'dashboard.pages.store',
            'edit' => 'dashboard.pages.edit',
            'update' => 'dashboard.pages.update',
            'destroy' => 'dashboard.pages.destroy',
        ]
    ]);

    Route::resource('testimonials', 'TestimonialController', [
        'names' => [
            'index' => 'dashboard.testimonials.index',
            'create' => 'dashboard.testimonials.create',
            'store' => 'dashboard.testimonials.store',
            'edit' => 'dashboard.testimonials.edit',
            'update' => 'dashboard.testimonials.update',
            'destroy' => 'dashboard.testimonials.destroy',
        ]
    ]);
    Route::resource('news', 'NewsController', [
        'names' => [
            'index' => 'dashboard.news.index',
            'create' => 'dashboard.news.create',
            'store' => 'dashboard.news.store',
            'edit' => 'dashboard.news.edit',
            'update' => 'dashboard.news.update',
            'destroy' => 'dashboard.news.destroy',
        ]
    ]);
    Route::resource('events', 'EventController', [
        'names' => [
            'index' => 'dashboard.events.index',
            'create' => 'dashboard.events.create',
            'store' => 'dashboard.events.store',
            'edit' => 'dashboard.events.edit',
            'update' => 'dashboard.events.update',
            'destroy' => 'dashboard.events.destroy',
        ]
    ]);
    Route::resource('tenders', 'TenderController', [
        'names' => [
            'index' => 'dashboard.tenders.index',
            'create' => 'dashboard.tenders.create',
            'store' => 'dashboard.tenders.store',
            'edit' => 'dashboard.tenders.edit',
            'update' => 'dashboard.tenders.update',
            'destroy' => 'dashboard.tenders.destroy',
        ]
    ]);
    Route::resource('careers', 'CareerController', [
        'names' => [
            'index' => 'dashboard.careers.index',
            'create' => 'dashboard.careers.create',
            'store' => 'dashboard.careers.store',
            'edit' => 'dashboard.careers.edit',
            'update' => 'dashboard.careers.update',
            'destroy' => 'dashboard.careers.destroy',
        ]
    ]);
    Route::resource('partners', 'PartnersController', [
        'names' => [
            'index' => 'dashboard.partners.index',
            'create' => 'dashboard.partners.create',
            'store' => 'dashboard.partners.store',
            'edit' => 'dashboard.partners.edit',
            'update' => 'dashboard.partners.update',
            'destroy' => 'dashboard.partners.destroy',
        ]
    ]);
    Route::resource('services', 'ServicesController', [
        'names' => [
            'index' => 'dashboard.services.index',
            'create' => 'dashboard.services.create',
            'store' => 'dashboard.services.store',
            'edit' => 'dashboard.services.edit',
            'update' => 'dashboard.services.update',
            'destroy' => 'dashboard.services.destroy',
        ]
    ]);
    Route::resource('steps', 'StepsController', [
        'names' => [
            'index' => 'dashboard.steps.index',
            'create' => 'dashboard.steps.create',
            'store' => 'dashboard.steps.store',
            'edit' => 'dashboard.steps.edit',
            'update' => 'dashboard.steps.update',
            'destroy' => 'dashboard.steps.destroy',
        ]
    ]);
    Route::resource('features', 'FeatureController', [
        'names' => [
            'index' => 'dashboard.features.index',
            'create' => 'dashboard.features.create',
            'store' => 'dashboard.features.store',
            'edit' => 'dashboard.features.edit',
            'update' => 'dashboard.features.update',
            'destroy' => 'dashboard.features.destroy',
        ]
    ]);
    Route::resource('category', 'CategoryController', [
        'names' => [
            'index' => 'dashboard.category.index',
            'create' => 'dashboard.category.create',
            'store' => 'dashboard.category.store',
            'edit' => 'dashboard.category.edit',
            'update' => 'dashboard.category.update',
            'destroy' => 'dashboard.category.destroy',
        ]
    ]);
    Route::resource('teams', 'TeamController', [
        'names' => [
            'index' => 'dashboard.teams.index',
            'create' => 'dashboard.teams.create',
            'store' => 'dashboard.teams.store',
            'edit' => 'dashboard.teams.edit',
            'update' => 'dashboard.teams.update',
            'destroy' => 'dashboard.teams.destroy',
        ]
    ]);
});
