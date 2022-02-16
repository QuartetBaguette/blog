<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Inertia\Inertia;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Inertia\Response
     */
    public function index()
    {
        return Inertia::render('Home', [
            'posts' => Blog::where('is_featured', '=', true)->get(),
        ]);
    }
}
