<?php

namespace App\Providers;

use App\Modules\Backend\Auth\PasswordResets\Repositories\EloquentPasswordResetsRepository;
use App\Modules\Backend\Auth\PasswordResets\Repositories\PasswordResetsRepository;
use App\Modules\Backend\Menus\Menu\Repositories\EloquentMenuRepository;
use App\Modules\Backend\Menus\Menu\Repositories\MenuRepository;
use App\Modules\Backend\Settings\Branch\Repositories\BranchRepository;
use App\Modules\Backend\Settings\Designation\Repositories\DesignationRepository;
use App\Modules\Backend\Settings\Designation\Repositories\EloquentDesignationRepository;
use App\Modules\Backend\Settings\District\Repositories\DistrictRepository;
use App\Modules\Backend\Settings\Branch\Repositories\EloquentBranchRepository;
use App\Modules\Backend\Settings\District\Repositories\EloquentDistrictRepository;
use App\Modules\Backend\Settings\Feedback\Repositories\EloquentFeedbackRepository;
use App\Modules\Backend\Settings\Feedback\Repositories\FeedbackRepository;
use App\Modules\Backend\Settings\Good\Repositories\EloquentGoodRepository;
use App\Modules\Backend\Settings\Good\Repositories\GoodRepository;
use App\Modules\Backend\Settings\GoodPrice\Repositories\EloquentGoodPriceRepository;
use App\Modules\Backend\Settings\GoodPrice\Repositories\GoodPriceRepository;
use App\Modules\Backend\Settings\LogManagement\Repositories\EloquentLogManagementRepository;
use App\Modules\Backend\Settings\LogManagement\Repositories\LogManagementRepository;
use App\Modules\Backend\Settings\Problem\Repositories\EloquentProblemRepository;
use App\Modules\Backend\Settings\Problem\Repositories\ProblemRepository;
use App\Modules\Backend\Settings\Province\Repositories\EloquentProvinceRepository;
use App\Modules\Backend\Settings\Province\Repositories\ProvinceRepository;
use App\Modules\Backend\Settings\StockSales\Policies\StockSalesPolicy;
use App\Modules\Backend\Website\Post\Repositories\EloquentPostRepository;
use App\Modules\Backend\Website\Post\Repositories\PostRepository;


use App\Modules\Backend\Website\Product\Repositories\EloquentProductRepository;
use App\Modules\Backend\Website\Product\Repositories\ProductRepository;
use Illuminate\Support\ServiceProvider;

class DependencyInjectionServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        /**
         * User dependency
         */
        $this->app->bind(
            \App\Modules\Backend\Authentication\User\Repositories\UserRepository::class,
            \App\Modules\Backend\Authentication\User\Repositories\EloquentUserRepository::class
        );

        /**
         * Permission dependency
         */
        $this->app->bind(
            \App\Modules\Backend\Authentication\Permission\Repositories\PermissionRepository::class,
            \App\Modules\Backend\Authentication\Permission\Repositories\EloquentPermissionRepository::class
        );

        /**
         * Role dependency
         */
        $this->app->bind(
            \App\Modules\Backend\Authentication\Role\Repositories\RoleRepository::class,
            \App\Modules\Backend\Authentication\Role\Repositories\EloquentRoleRepository::class
        );

        /**
         * Site Setting dependency
         */
        $this->app->bind(
            \App\Modules\Backend\Settings\SiteSetting\Repositories\SiteSettingRepository::class,
            \App\Modules\Backend\Settings\SiteSetting\Repositories\EloquentSiteSettingRepository::class
        );

        /**
         * Slider dependency
         */
        $this->app->bind(
            \App\Modules\Backend\Website\Slider\Repositories\SliderRepository::class,
            \App\Modules\Backend\Website\Slider\Repositories\EloquentSliderRepository::class
        );
        /**
        CMS
         * Banner dependency
         */
        $this->app->bind(
            PostRepository::class,
            EloquentPostRepository::class
        );
        /**CMS
         * Banner dependency
         */
        $this->app->bind(
            PostRepository::class,
            EloquentPostRepository::class
        );
        /**
         * Menu Dependency
         */
        $this->app->bind(
            MenuRepository::class,
            EloquentMenuRepository::class
        );
        /**
         * Product Dependency
         */
        $this->app->bind(
            ProductRepository::class,
            EloquentProductRepository::class
        );
        /**
         * District Repository
         */
        $this->app->bind(
            DistrictRepository::class,
            EloquentDistrictRepository::class
        );
        /**
         * Province Repository
         */
        $this->app->bind(
            ProvinceRepository::class,
            EloquentProvinceRepository::class
        );
        /**
         * Branch Repository
         */
        $this->app->bind(
            BranchRepository::class,
            EloquentBranchRepository::class
        );
        /**
         * Good Repository
         */
        $this->app->bind(
           GoodRepository::class,
            EloquentGoodRepository::class
        );
        $this->app->bind(
            GoodPriceRepository::class,
            EloquentGoodPriceRepository::class
        );
        $this->app->bind(
            DesignationRepository::class,
            EloquentDesignationRepository::class
        );
        $this->app->bind(
            \App\Modules\Backend\Settings\GoodManagement\Repositories\GoodManagementRepository::class,
            \App\Modules\Backend\Settings\GoodManagement\Repositories\EloquentGoodManagementRepository::class
        );
        $this->app->bind(
            \App\Modules\Backend\Settings\StockSales\Repositories\StockSalesRepository::class,
            \App\Modules\Backend\Settings\StockSales\Repositories\EloquentStockSalesRepository::class
        );
        $this->app->bind(
            \App\Modules\Backend\Settings\Purchases\Repositories\PurchasesRepository::class,
            \App\Modules\Backend\Settings\Purchases\Repositories\EloquentPurchasesRepository::class
        );
        $this->app->bind(
            FeedbackRepository::class,
            EloquentFeedbackRepository::class
        );
        $this->app->bind(
            ProblemRepository::class,
            EloquentProblemRepository::class
        );
        $this->app->bind(
            LogManagementRepository::class,
            EloquentLogManagementRepository::class
        );
        $this->app->bind(
            PasswordResetsRepository::class,
            EloquentPasswordResetsRepository::class

        );
    }
}
