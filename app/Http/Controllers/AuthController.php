<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;


class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    /**
     * Handle an authentication attempt.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response|RedirectResponse
     */
    public function authenticate()
    {
        $credentials = request()->validate([
            'email' => ['required', 'email'],
            'password' => ['required']
        ]);

        if (! Auth::attempt($credentials, request()->boolean('remember'))) {
            return back()->withErrors([
                'email' => 'Invalid login credentials!'
            ])->onlyInput('email');
        }

        session()->regenerate();

        return to_route('users.show', ['user' => Auth::id()])->with('message', 'Welcome back!');
    }

    public function logout()
    {
        auth()->logout();

        return to_route("auth.login")->with('message', 'Goodbye!');
    }
}
