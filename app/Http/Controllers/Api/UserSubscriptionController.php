<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\StoreSubscriptionRequest;
use App\Models\User;
use Illuminate\Http\Response;

class UserSubscriptionController extends Controller
{
    public function store(StoreSubscriptionRequest $request, User $user)
    {
        $user->subscriptions()->create($request->validated());

        return Response::api('Subscription successful.');
    }
}
