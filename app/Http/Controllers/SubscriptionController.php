<?php

namespace App\Http\Controllers;

use App\Models\Subscription;

class SubscriptionController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Subscription::class);
    }

    public function index()
    {
        return view('users.subscriptions.index', ['subscriptions' => Subscription::has('user')->get()]);
    }

    public function show(Subscription $subscription)
    {
        return view('users.subscriptions.show', ['subscription' => $subscription]);
    }

}
