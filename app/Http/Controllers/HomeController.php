<?php

namespace App\Http\Controllers;

class HomeController extends Controller
{
    public function show()
    {
        $monthly_sub = user()->subscriptions()->thisMonth()->count();
        $tot_amount  = user()->subscriptions()->thisMonth()->successful()->sum('amount');

        return view('users.dashboard', ['monthly_sub' => $monthly_sub, 'tot_amount' => $tot_amount]);
    }

}
