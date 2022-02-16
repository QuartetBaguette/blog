<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class UserPagesController extends Controller
{
    public function login() {
        return Inertia::render('User/Login');
    }

    public function register() {
        return Inertia::render('User/Register');
    }

    public function profile() {
        return Inertia::render('User/Profile', [
            'userinfo' => User::where('id', '=', Auth::id())->get(),
            'posts' => Blog::where('user_id', '=', Auth::id())->get(),
            'settings' => true,
        ]);
    }
}
