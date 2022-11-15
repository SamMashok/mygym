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
        $this->registerResponseMacros();

        Blade::if('admin', function (User $user = null) {
            return ($user ?? auth()->user())->isAdmin();
        });

        Blade::if('paid', function (Subscription $subscription) {
            return $subscription->paid_at != null;
        });

        Blade::if('subscriptionRoute', fn () => request()->route()->named('users.subscriptions.index'));
    }

    public function registerResponseMacros()
    {
        /**
         * Creates a standard json structure for consistent api responses in a simple way.
         * {"status": true, "title": "Some title", "message": "Successful", "data": [a, b, c]}
         */
        Response::macro('api', function ($response, $status = 200) {
            $format = ['status' => ($status < 400), 'title' => '', 'message' => '', 'data' => []];

            // For convenience, if $response is a string, we'll use it as the message...
            if (! is_array($response)) $response = ['message' => $response];

            return response(array_merge($format, $response), $status);
        });
    }
}
