<?php

namespace App\Jobs;

use App\Models\Subscription;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Support\Facades\Http;

class PollPendingSubscriptions
{
    use Dispatchable;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        Subscription::latest()->pending()->each(
            $this->pollSubscription(...)
        );
    }

    public function pollSubscription(Subscription $subscription)
    {
        $response = Http::withToken(config('services.paystack.sk'))
            ->get("https://api.paystack.co/transaction/verify/" . $subscription->reference);

        if ($response->json('data.status') == 'success') {
            $subscription->markAsPaid();
        }
    }
}
