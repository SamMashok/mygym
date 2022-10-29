<?php

namespace App\Providers;

use App\Models\Subscription;
use App\Models\User;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
       Blade::if('admin', function (User $user = null) {
           return ($user ?? auth()->user())->isAdmin();
       });

        Blade::if('paid', function (Subscription $subscription) {
            return $subscription->paid_at != null;
        });
    }
}
