<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    //
    public function show($id) {
        $post = Post::findOrFail($id);
        $this->authorize($post, ['delete']);
        return view('post_show', compact('post'));
    }
}
