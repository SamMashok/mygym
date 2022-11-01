<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(User::class);
    }

    public function index()
    {
        $users = User::all();

        return view('users.index', compact('users'));
    }


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


    public function show(User $user)
    {
        return view('users.profile', compact('user'));
    }


    public function update(UpdateUserRequest $request, User $user)
    {
        $user->update($request->except(['old_password', 'password_confirmation']));

        return back()->with('message', 'Profile update successful');
    }


    public function destroy(User $user)
    {
        $user->delete();

        return to_route('users.index')->with('message', 'User has been deleted successfully');
    }

}





















