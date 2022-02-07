<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Models\Blogs;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function() {
    return Inertia::render('Home', [
        'posts' => Blogs::all(),
    ]);
});

Route::get('/blogs', function() {
    return Inertia::render('Blogs', [
        'time' => now()->toTimeString(),
    ]);
});

Route::get('/settings', function() {
    return Inertia::render('Settings');
});

Route::get('/blog', function() {
   return Inertia::render('Blog');
});

Route::get('/loginpage', function() {
   return Inertia::render('LoginPage');
});

Route::get('/registrationpage', function() {
    return Inertia::render('RegistrationPage');
});

Route::post('/register', [RegisterController::class, 'register']);
