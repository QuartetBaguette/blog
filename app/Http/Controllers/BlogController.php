<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Inertia\Response
     */
    public function index()
    {
        return Inertia::render('Blogs/Index', [
            'posts' => Blog::All(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Inertia\Response
     */
    public function create()
    {
        return Inertia::render('Blogs/Create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|min:2|max:40|unique:blogs',
            'summary' => 'required|min:10|max:255|unique:blogs',
            'blogContent' => 'required|min:50|unique:blogs',
        ]);

        Blog::create([
            'title' => $request->title,
            'summary' => $request->summary,
            'content' => $request->blogContent,
            'cover_url' => $request->cover,
            'reading_time' => 20,
            'can_comment' => $request->comments,
            'is_anonymous' => $request->anonymous,
            'user_id' => Auth::id(),
            'is_featured' => false,
        ]);

        return redirect('/blogs');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Inertia\Response
     */
    public function show($id)
    {
        return Inertia::render('Blogs/Show', [
            'blogs' => Blog::where('id', '=', $id)->get(),
            'comments' => Comment::where('blog_id', '=', $id)->get(),
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        Blog::where('id', '=', $id)->delete();
        return back();
    }
}
