<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    //
    public function show($id) {
        $this->authorize('view-post');
        $post = Post::findOrFail($id);
        return view('post_show', compact('post'));
    }
}
