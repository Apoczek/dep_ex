<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function show(Post $post, $slug)
    {
        return view('welcome', compact('post'));
    }
}
