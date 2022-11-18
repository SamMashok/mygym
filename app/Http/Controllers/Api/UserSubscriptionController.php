<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\StoreSubscriptionRequest;
use App\Models\User;

class UserSubscriptionController extends Controller
{
    public function store(StoreSubscriptionRequest $request, User $user)
    {
        $user->subscriptions()->create($request->validated());

        return back()->with('message', 'Subscription successful.');
    }
}
