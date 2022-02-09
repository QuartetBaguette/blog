<?php

use App\Http\Controllers\BlogController;
use App\Models\Blogs;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

//// VIEW PAGES
Route::get('/', function() {
    return Inertia::render('Home', [
        'posts' => Blogs::all(),
    ]);
});

Route::get('/home', function() {
    return Inertia::render('Home', [
        'posts' => Blogs::all(),
    ]);
})->name('home');

Route::get('/blogs', function() {
    return Inertia::render('Blogs', [
        'time' => now()->toTimeString(),
    ])->name('blogs');
});

//// MIDDLEWARE GUEST
Route::group(['middleware' => 'guest'], function() {
    Route::get('/loginpage', function() {
        return Inertia::render('LoginPage');
    })->name('loginpage');

    Route::get('/registrationpage', function() {
        return Inertia::render('RegistrationPage');
    });
});

//// MIDDLEWARE AUTH
Route::group(['middleware' => 'auth'], function() {
    Route::post('/blog/create', [BlogController::class, 'createBlog'])
        ->name('blog.create');

    Route::get('/createblog', function() {
        return Inertia::render('CreateBlog');
    });

    Route::get('/settings', function() {
        return Inertia::render('Settings');
    })->name('settings');

    Route::get('/myprofile', function () {
       return Inertia::render('UserProfile', [
           'userinfo' => User::get()->where('id', '=', Auth::id()),
           'posts' => Blogs::get()->where('authorID', '=', Auth::id())
       ]);
    });
});
