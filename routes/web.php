<?php

use App\Http\Controllers\BlogController;
use App\Models\Blogs;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

//// VIEW PAGES

// HOME PAGES
Route::get('/', function() {
    return Inertia::render('Home', [
        'posts' => Blogs::get()->where('featured', '=', true),
    ]);
});
Route::get('/home', function() {
    return Inertia::render('Home', [
        'posts' => Blogs::get()->where('featured', '=', true),
    ]);
})->name('home');
//

// ALL BLOGS
Route::get('/blogs', function() {
    return Inertia::render('Blogs', [
        'posts' => Blogs::all(),
    ]);
})->name('blogs');

// SINGLE BLOG
Route::get('/blog', function() {
    return Inertia::render('Blog', [
       'blogs' => Blogs::get()->where('id','1'),
    ]);
})->name('blog');

//// MIDDLEWARE GUEST
Route::group(['middleware' => 'guest'], function() {

    // LOGINPAGE
    Route::get('/loginpage', function() {
        return Inertia::render('LoginPage');
    })->name('loginpage');

    // REGISTRATION PAGE
    Route::get('/registrationpage', function() {
        return Inertia::render('RegistrationPage');
    });

});

//// MIDDLEWARE AUTH
Route::group(['middleware' => 'auth'], function() {

    // CREATE BLOG CONTROLLER
    Route::post('/blog/create', [BlogController::class, 'createBlog'])
        ->name('blog.create');

    // CREATE BLOG PAGE
    Route::get('/createblog', function() {
        return Inertia::render('CreateBlog');
    });

    // DELETE BLOG
    Route::post('/blog/delete/', [BlogController::class, 'deleteBlog'])
        ->name('blog.delete');

    // SETTINGS PAGE
    Route::get('/settings', function() {
        return Inertia::render('Settings');
    })->name('settings');

    // USER PROFILE PAGE
    Route::get('/myprofile', function () {
       return Inertia::render('UserProfile', [
           'userinfo' => User::get()->where('id', '=', Auth::id()),
           'posts' => Blogs::get()->where('authorID', '=', Auth::id()),
           'settings' => true,
       ]);
    });

});

//// ADMIN PAGES
Route::get('/usermanagement', function() {
    return Inertia::render('Admin/UserManagement');
});
