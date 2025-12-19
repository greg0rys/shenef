<?php

namespace App\Providers;

use App\Models\Company;
use App\Models\CompanyLocations;
use App\Models\Item;
use App\Models\User;
use App\Observers\CompanyObserver;
use App\Observers\CompanyUser;
use App\Observers\ItemObserver;
use App\Observers\UserObserver;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
        User::observe(UserObserver::class);
        CompanyLocations::observe(CompanyUser::class);
        Item::observe(ItemObserver::class);
        Company::observe(CompanyObserver::class);
    }
}
