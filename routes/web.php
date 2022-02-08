<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Models\Blogs;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

// VIEW PAGES
Route::get('/', function() {
    return Inertia::render('Home', [
        'posts' => Blogs::all(),
    ]);
})->name('home');

Route::get('/blogs', function() {
    return Inertia::render('Blogs', [
        'time' => now()->toTimeString(),
    ]);
});

Route::get('/settings', function() {
    return Inertia::render('Settings');
});

Route::get('/createblog', function() {
    return Inertia::render('CreateBlog');
});

Route::get('test', function () {
   dd('test');
});
Route::get('/loginpage', function() {
   return Inertia::render('LoginPage');
})->name('loginpage');

Route::get('/registrationpage', function() {
    return Inertia::render('RegistrationPage');
});

// CONTROLLER ROUTES
Route::post('/login/validate', [LoginController::class, 'validateLogin'])
    ->name('login.validate');
Route::post('/login/index', [LoginController::class, 'index'])
    ->name('login.index');

Route::post('/register/store', [RegisterController::class, 'store'])
    ->name('register.store');
Route::get('/register/index', [RegisterController::class, 'index'])
    ->name('register.index');

Route::post('/blog/create', [BlogController::class, 'createBlog'])
    ->name('blog.create');

Route::group(['middleware' => 'auth'], function() {
    Route::get('/logout', [LoginController::class, 'logout'])
        ->name('logout');
});
