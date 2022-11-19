<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class UserController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(User::class);
    }

    public function store(Request $request)
    {
        $attributes = $request->validate([
            'name'     => 'required',
            'email'    => 'required|email|unique:users',
            'username' => 'required|alpha_num|unique:users',
            'gender'   => 'required',
            'type'     => 'required'
        ]);

        User::create($attributes);

        return Response::api('User has been created successfully.');
    }


    public function update(UpdateUserRequest $request, User $user)
    {
        $user->update($request->except(['old_password', 'password_confirmation']));

        return Response::api('Profile update successful');
    }


    public function destroy(User $user)
    {
        $user->delete();

        return Response::api('User has been deleted successfully');
    }

}





















