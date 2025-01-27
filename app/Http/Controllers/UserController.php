<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;


class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('users.index', ['users' => $users]);
    }
    public function show($id)
    {
        $user = User::find($id);
        return view('users.show', ['user' => $user]);
    }
    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
        ]);

        
        if ($request->hasFile('profile_pic')) {
            // @dd($request->profile_pic);
            $imagePath = $request->profile_pic->store('profiles', 'public');
            $user->profile_pic = $imagePath;
        }
        // @dd($user->profile_pic);

        $user->name = request('name');
        $user->email = request('email');
        $user->update();
        return redirect(route('home'));
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect(route('home'));
    }

}
