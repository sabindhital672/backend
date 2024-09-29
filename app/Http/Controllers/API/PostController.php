<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Post;

class PostController extends Controller
{

    public function index()
    {
        return response()->json(Post::all());
    }

    public function show($id)
    {
        return response()->json(Post::findOrFail($id));
    }
}
