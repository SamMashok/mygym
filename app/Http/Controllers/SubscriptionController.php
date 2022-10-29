<?php

namespace App\Http\Controllers;

use App\Models\Subscription;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class SubscriptionController extends Controller
{
    public function index()
    {
        $this->authorize('view-any', User::class);

        return view('users.subscriptions.index', ['subscriptions' => Subscription::all()]);
    }


    public function store()
    {
        $this->authorize('create', $user);

        request()->validate([
            'date'     => 'required',
            'amount'   => 'required'
        ]);

        Subscription::create([
            'date'        => request()->date,
            'amount'      => request()->amount,
            'user_id'     => Auth::id(),
            'reference'   => strToUpper(Str::random(15))
        ]);

        return back()->with('message', 'Subscription successfully.');
    }


    public function show(User $user)
    {

    }


    public function update(User $user)
    {

    }


    public function destroy(User $user)
    {

    }

}
