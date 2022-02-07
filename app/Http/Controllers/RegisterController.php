<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function register(Request $request) {
        if (User::where('name', '=', $request->username)->exists()) {
            dd('username exists');
        }
        else if (User::where('email', '=', $request->email)->exists()) {
            dd('email exists');
        }
        else {
            $this->validate($request, [
                'username' => 'required|min:4|max:20',
                'email' => 'email',
                'password' => 'min:6|required_with:password_confirmation|same:password_confirmation|max:70',
                'password_confirmation' => 'min:6|max:70'
            ]);
            $user = [
                'username' => $request->username,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ];

            User::create([
                'name' => $user['username'],
                'email' => $user['email'],
                'password' => $user['password']
            ]);
        }
    }
}
