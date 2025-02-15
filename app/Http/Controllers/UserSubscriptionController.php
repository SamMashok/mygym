<?php

namespace App\Http\Controllers;
use App\Models\User;

class UserSubscriptionController extends Controller
{
    public function index(User $user)
    {
        $this->authorize('view', $user);
        $subscriptions = $user->subscriptions;

        return view('users.subscriptions.index', ['subscriptions' => $user->subscriptions, 'user' => $user]);
    }
}
