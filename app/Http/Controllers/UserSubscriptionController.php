<?php

namespace App\Http\Controllers;

use App\Models\Subscription;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class UserSubscriptionController extends Controller
{
    public function index(User $user)
    {
        $this->authorize('view', $user);

        return view('users.subscriptions.index', ['subscriptions' => $user->subscriptions]);
    }

    public function show(User $user, Subscription $subscription )
    {
        $this->authorize('view', $user);

        return view('users.subscriptions.show', ['subscription' => $subscription]);
    }

    public function store(User $user)
    {
        $this->authorize('create', $user);

        request()->validate([
            'date'     => 'required',
            'amount'   => 'required'
        ]);

        Subscription::create([
            'date'        => request()->date,
            'amount'      => request()->amount,
            'user_id'     => $user->id,
            'reference'   => strToUpper(Str::random(15))
        ]);

        return back()->with('message', 'Subscription successfully.');
    }

    public function update(Request $request, User $user)
    {
        //
    }

    public function destroy(User $user)
    {
        //
    }
}
