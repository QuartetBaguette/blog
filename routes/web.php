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

// SINGLE BLOG
Route::get('/blog/{blog}', [BlogController::class, 'show'])->name('blogs.show');

//// MIDDLEWARE GUEST
Route::group(['middleware' => 'guest'], function() {

    // LOGINPAGE
    Route::get('/login', [UserPagesController::class, 'login'])->name('login');

    // REGISTRATION PAGE
    Route::get('/register', [UserPagesController::class, 'register'])->name('register');

});

//// MIDDLEWARE AUTH
Route::group(['middleware' => 'auth'], function() {

    // CREATE NEW BLOG
    Route::post('/blog/store', [BlogController::class, 'store'])->name('blogs.store');

    // CREATE BLOG PAGE
    Route::get('/createblog', [BlogController::class, 'create'])->name('create.blog');

    // DELETE BLOG
    Route::get('/blog/delete/{id}', [BlogController::class, 'destroy'])->name('blogs.delete');

    // CREATE COMMENT
    Route::post('/comment/store', [CommentsController::class, 'store'])->name('comments.store')
        ->middleware('throttle:0,01');

    // USER PROFILE PAGE
    Route::get('/myprofile', [UserPagesController::class, 'profile'])->name('profile');

});
