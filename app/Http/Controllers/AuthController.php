<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    // Show Registration Form
    public function create()
    {
        return view('auth.register');
    }

    // Handle Registration
    public function store(Request $request)
    {
        // Validate the request
        $attributes = $request->validate([
            'name' => ['required', 'string','max:255'],
            'username' => ['required', 'string','max:255'],
            'email' => ['required','string','email','max:255','unique:users'],
            'password' => ['required','string','min:8','confirmed'],
        ]);
        // Create a new users
        $attributes['password'] = Hash::make($attributes['password']);
        $user = User::create($attributes);

        // Automatically log in the users after registration
//        Auth::attempt($request->only('email', 'password'));

        Auth::login($user);

        $user->collections()->create([
            'user_id' => $user->id,
            'name' => 'Library',
            'description' => 'Owned Games',
            'image' => '',
        ]);
        $user->collections()->create([
            'user_id' => $user->id,
            'name' => 'Favorite',
            'description' => 'Favorite Games',
            'image' => '',
        ]);
        return redirect('/');
    }
}

