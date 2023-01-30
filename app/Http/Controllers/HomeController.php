<?php

namespace App\Http\Controllers;

use App\Models\Subscription;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{

    public function show()
    {
        $monthly_sub = Subscription::where('user_id', Auth::id())->thisMonth()->count();
        $tot_amount  = Subscription::where('user_id','=', Auth::id())->thisMonth()->successful()->sum('amount');

        return view('users.dashboard', ['monthly_sub' => $monthly_sub, 'tot_amount' => $tot_amount]);
    }

}
