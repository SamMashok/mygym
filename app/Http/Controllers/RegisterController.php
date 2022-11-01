<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('auth.register');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $attributes = $request->validate([
            'name'     => 'required',
            'email'    => 'required|email|unique:users',
            'username' => 'required|alpha_num|unique:users',
            'gender'   => 'required',
            'password' => 'required|confirmed'
        ]);

        User::create($attributes);

        return to_route("login")
            ->with('message', 'Your account has been registered successfully, use your credentials to login');
    }

}
