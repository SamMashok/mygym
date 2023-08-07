<?php

namespace App\Http\Controllers;

use App\Models\Subscription;
use App\Models\User;

class HomeController extends Controller
{
    public function show()
    {
        $monthly_sub    = user()->subscriptions()->thisMonth()->count();
        $tot_amount     = user()->subscriptions()->thisMonth()->successful()->sum('amount');
        $amount         = Subscription::thisMonth()->successful()->sum('amount');
        $subscriptions  = Subscription::thisMonth()->count();
        $users          = User::where('type', 1)->count();


        return view('users.dashboard', compact(['monthly_sub', 'tot_amount', 'subscriptions', 'users','amount']));
    }

}
