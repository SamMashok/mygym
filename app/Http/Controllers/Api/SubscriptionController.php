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
        return Response::api([
            'data'    => compact('subscription'),
        ]);
    }


}
