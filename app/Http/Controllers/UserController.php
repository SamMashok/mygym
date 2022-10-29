<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function index()
    {
        $this->authorize('view-any', User::class);

        $users = User::all();

        return view('users.index', compact('users'));
    }


    public function store(Request $request)
    {
        request()->validate([
            'name'     => 'required',
            'email'    => 'required|email|unique:users',
            'username' => 'required|alpha_num|unique:users',
            'gender'   => 'required',
            'password' => 'required|confirmed'
        ]);

        User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'username' => $request->username,
            'gender'   => $request->gender,
            'password' => $request->password
        ]);

        return to_route("login")
            ->with('message', 'Your account has been registered successfully, use your credentials to login');
    }


    public function show(User $user)
    {
        $this->authorize('view', $user);

        return view('users.profile', compact('user'));
    }


    public function update(User $user)
    {
        $this->authorize('update', $user);

        request()->validate([
            'email'        => ['email', $unique = Rule::unique('users')->ignore($user)],
            'username'     => ['alpha_num', $unique],
            'old_password' => ['current_password'],
            'password'     => ['confirmed']
        ]);

        $user->update(request()->except(['old_password', 'password_confirmation']));

        return back()->with('message', 'Profile update successful');
    }


    public function destroy(User $user)
    {
        $this->authorize('delete', $user);

        $user->delete();

        return to_route('users.index')->with('message', 'User has been deleted successfully');
    }

}





















