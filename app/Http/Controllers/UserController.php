<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function showProfile()
    {
        $user = auth()->user();
        return view('profile', compact('user'));
    }

    public function updateProfile(Request $request)
    {
        $user = auth()->user();
        $user->update($request->only('name', 'email', 'contact_person', 'address'));
        return redirect()->route('profile.show')->with('success', 'Profile updated!');
    }

}
