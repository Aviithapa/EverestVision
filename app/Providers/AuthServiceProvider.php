<?php

namespace App\Providers;


use App\Models\Auth\Permission;
use App\Models\Auth\Role;
use App\Models\Setting\GoodPrice;
use App\Models\Setting\Purchases;
use App\Models\Setting\StockSales;
use App\Models\Website\SiteSetting;
use App\Models\Website\Slider;
use App\Models\Auth\User;
use App\Modules\Backend\Authentication\Permission\Policies\PermissionPolicy;
use App\Modules\Backend\Authentication\Role\Policies\RolePolicy;
use App\Modules\Backend\Authentication\User\Policies\UserPolicy;
use App\Modules\Backend\Settings\Good\Policies\GoodPolicy;
use App\Modules\Backend\Settings\Purchases\Policies\PurchasesPolicy;
use App\Modules\Backend\Settings\Setting\Policies\SiteSettingPolicy;
use App\Modules\Backend\Settings\StockSales\Policies\StockSalesPolicy;
use App\Modules\Backend\Website\Slider\Policies\SliderPolicy;
use Illuminate\Auth\Access\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Contracts\Auth\Access\Gate as GateContract;


class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     * Model => Policy
     *
     * @var array
     */
    protected $policies = [
        User::class => UserPolicy::class,
        Role::class => RolePolicy::class,
        Permission::class => PermissionPolicy::class,
        SiteSetting::class => SiteSettingPolicy::class,
        Slider::class => SliderPolicy::class,
        GoodPrice::class => GoodPolicy::class,
        Purchases::class => PurchasesPolicy::class,
        StockSales::class => StockSalesPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot(GateContract $gate)
    {
        $this->registerPolicies($gate);
        $gate->before(function ($user, $ability) {
            if ($user->isSuperAdmin()) {
                return true;
            }
        });
    }

    public function register()
    {
        $this->registerAccessGate();
    }

    protected function registerAccessGate()
    {
        $this->app->singleton(GateContract::class, function ($app) {
            return new Gate($app, function () use ($app) {
                return $this->app['auth']->getUser();
            });
        });
    }
}
