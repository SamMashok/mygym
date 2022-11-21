<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class RegisterController extends Controller
{
    public function store(Request $request)
    {
        $attributes = $request->validate([
            'name'     => 'required',
            'email'    => 'required|email|unique:users',
            'username' => 'required|alpha_dash|unique:users',
            'gender'   => 'required',
            'password' => 'required|confirmed'
        ]);

        $user = User::create($attributes);
        auth()->login($user);

        return Response::api('Your account has been registered successfully, use your credentials to login');
    }

}
