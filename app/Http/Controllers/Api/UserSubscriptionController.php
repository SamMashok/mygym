<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\StoreSubscriptionRequest;
use App\Models\User;
use Illuminate\Http\Response;

class UserSubscriptionController extends Controller
{
    public function store(StoreSubscriptionRequest $request, User $user)
    {
        $subscription = $user->subscriptions()->create($request->validated());

        return Response::api([
            'message' => 'Subscription created',
            'data'    => compact('subscription'),
        ]);
    }

}
