<?php

namespace App\Http\Controllers\Api;

use App\Models\Subscription;
use Illuminate\Http\Response;

class SubscriptionController extends Controller
{
//    public function __construct()
//    {
//        $this->authorizeResource(Subscription::class);
//    }

    public function show(Subscription $subscription)
    {
        $subscription->update(['paid_at' => now()]);

        return Response::api([
            'message' => 'Subscription was Successful',
            'data'    => compact('subscription'),
        ]);
    }


}
