<?php

namespace App\Http\Controllers;

use App\Models\Subscription;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class SubscriptionController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Subscription::class);
    }

    public function index()
    {
        return view('users.subscriptions.index', ['subscriptions' => Subscription::all()]);
    }

    public function show(Subscription $subscription)
    {
        return view('users.subscriptions.show', ['subscription' => $subscription]);
    }

}
