<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\CommentsController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserPagesController;
use Illuminate\Support\Facades\Route;

//// VIEW PAGES

// HOME PAGE
Route::get('/', [HomeController::class, 'index'])->name('home');

// ALL BLOGS
Route::get('/blogs', [BlogController::class, 'index'])->name('blogs.index');


//// MIDDLEWARE GUEST
Route::group(['middleware' => 'guest'], function () {

    // LOGINPAGE
    Route::get('/login', [UserPagesController::class, 'login'])->name('login');

    // REGISTRATION PAGE
    Route::get('/register', [UserPagesController::class, 'register'])->name('register');
});

//// MIDDLEWARE AUTH
Route::group(['middleware' => 'auth'], function () {

    // CREATE NEW BLOG
    Route::post('/blogs/store', [BlogController::class, 'store'])->name('blogs.store');

    // CREATE BLOG PAGE
    Route::get('/blogs/create', [BlogController::class, 'create'])->name('blogs.create');

    // DELETE BLOG
    Route::delete('/blogs/{blog}', [BlogController::class, 'destroy'])->name('blogs.destroy');

    // CREATE COMMENT
    Route::post('/comment/store', [CommentsController::class, 'store'])->name('comments.store');

    // USER PROFILE PAGE
    Route::get('/myprofile', [UserPagesController::class, 'profile'])->name('profile');
});


// SINGLE BLOG
Route::get('/blogs/{blog}', [BlogController::class, 'show'])->name('blogs.show');
