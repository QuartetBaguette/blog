<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class RegisterController extends Controller
{
    public function store(Request $request) {
        $username = Str::lower($request->username);
        $email = Str::lower($request->email);
        if (User::where('name', '=', $username)->exists()) {
            dd('Username is already in use');
        }
        else if (User::where('email', '=', $email)->exists()) {
            dd('This email is already in use');
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
                'imageURL' => $request->imageURL,
            ];

            User::create([
                'name' => $user['username'],
                'email' => $user['email'],
                'password' => $user['password'],
                'imageURL' => $user['imageURL']
            ]);

            return Redirect::route('home');
        }
    }
}
