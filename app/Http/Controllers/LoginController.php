<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Inertia\Inertia;

class LoginController extends Controller
{
    public function validateLogin(Request $request) {
        $this->validate($request, [
           'email' => 'required',
           'password' => 'required|min:6',
        ]);

        $user_data = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        if(Auth::attempt($user_data)){
            return redirect('/');
        }
        else{
            return back()->with('error', 'These credentials do not match our records.');
        }
    }

    public function logout(Request $request) {
        $request->session()->invalidate();
        Auth::logout();
        return Inertia::render('Home');
    }
}
