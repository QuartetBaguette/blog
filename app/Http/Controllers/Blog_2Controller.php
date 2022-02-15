<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Blogs;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Blog_2Controller extends Controller
{
    public function createBlog(Request $request) {
        $this->validate($request, [
            'title' => 'required|min:2|max:40',
            'summary' => 'required|min:10|max:255',
            'blogContent' => 'required|min:50',
        ]);

        $user = Auth::user();

        Blogs::create([
            'title' => $request->title,
            'summary' => $request->summary,
            'text' => $request->blogContent,
            'cover' => $request->cover,
            'readingTime' => 20,
            'comments' => $request->comments,
            'anonymous' => $request->anonymous,
            'likes' => $request->likes,
            'author' => Auth::user()->name,
            'authorID' => $user->id,
            'featured' => false,
        ]);

        return redirect('blogs');
    }

    public function deleteBlog(Request $request) {
        $blogId = $request->blogID;
        $blog = Blog::find($blogId);
        $blog->delete();
        return back();
    }
}
