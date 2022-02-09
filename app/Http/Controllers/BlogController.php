<?php

namespace App\Http\Controllers;

use App\Models\Blogs;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BlogController extends Controller
{
    public function createBlog(Request $request) {
        $this->validate($request, [
            'title' => 'required|min:2|max:40',
            'summary' => 'required|min:10|max:220',
            'blogContent' => 'required|min:50',
        ]);

        $current_userID = Auth::id();
        $user = User::get()->where('id', $current_userID);

        Blogs::create([
            'title' => $request->title,
            'summary' => $request->summary,
            'text' => $request->blogContent,
            'cover' => $request->cover,
            'readingTime' => 20,
            'comments' => $request->comments,
            'anonymous' => $request->anonymous,
            'likes' => $request->likes,
            'author' => $user[0]['name'],
            'authorID' => $current_userID,
            'featured' => false,
        ]);

        return redirect('blogs');
    }

    public function deleteBlog(Request $request) {
        dd($request);
    }
}
