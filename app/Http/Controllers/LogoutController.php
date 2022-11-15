<?php

namespace App\Http\Controllers;

class LogoutController extends Controller
{
    public function __invoke()
    {
        auth()->logout();

        return to_route("login")->with('message', 'Goodbye!');
    }
}
