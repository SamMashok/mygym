<?php

namespace App\Providers;

use App\Models\Subscription;
use App\Models\User;
use Illuminate\Http\Response;
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
        $this->registerApiResponseMacro();

//        Blade::if('admin', function (User $user = null) {
//            return ($user ?? auth()->user())->isAdmin();
//        });
//
//        Blade::if('paid', function (Subscription $subscription) {
//            return $subscription->paid_at != null;
//        });
//
//        Blade::if('subscriptionRoute', fn () => request()->route()->named('users.subscriptions.index'));
    }


    /**
     * Creates a Response macro for API json responses having a standard format;
     */
        public function registerApiResponseMacro(): void
    {
        Response::macro('api', function (string $message = '', $data = [], $status = 200, array $headers = []) {
            return response()->json(['message' => $message, 'data' => $data], $status, $headers);
        });
    }
}
