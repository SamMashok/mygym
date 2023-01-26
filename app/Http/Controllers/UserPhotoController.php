<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\RedirectResponse;

class UserPhotoController extends Controller
{
    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response|RedirectResponse
     */
    public function update(User $user)
{
        request()->validate([
            'photo' => ['required','mimes:jpg,jpeg,png','max:2048']
        ]);

        $path = request()->photo->store('uploads');

        $user->update(['photo' => $path]);

        return back()->with('message', 'Profile update successful');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response|RedirectResponse
     */
    public function destroy(User $user)
    {
        $user->update(['photo' => null]);

        return back()->with('message', 'Profile update successful');

    }
}
