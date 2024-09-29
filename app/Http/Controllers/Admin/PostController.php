<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    // Display a listing of the posts
    public function index()
    {
        $posts = Post::all(); // Fetch all posts
        return view('admin.posts.index', compact('posts')); // Return the view with posts data
    }

    // Show the form for creating a new post
    public function create()
    {
        return view('admin.posts.create'); // Return the post creation form view
    }

    // Store a newly created post in storage
    public function store(Request $request)
    {
        // Validate incoming request data
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        // Create a new post
        Post::create($validatedData);

        return redirect()->route('admin.posts.index')->with('success', 'Post created successfully.');
    }

    // Show the form for editing the specified post
    public function edit($id)
    {
        $post = Post::findOrFail($id); // Find the post by ID or throw a 404 error
        return view('admin.posts.edit', compact('post')); // Return the post edit form view
    }

    // Update the specified post in storage
    public function update(Request $request, $id)
    {
        $post = Post::findOrFail($id); // Find the post by ID or throw a 404 error

        // Validate incoming request data
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        // Update the post with validated data
        $post->update($validatedData);

        return redirect()->route('admin.posts.index')->with('success', 'Post updated successfully.');
    }

    // Remove the specified post from storage
    public function destroy($id)
    {
        $post = Post::findOrFail($id); // Find the post by ID or throw a 404 error
        $post->delete(); // Delete the post

        return redirect()->route('admin.posts.index')->with('success', 'Post deleted successfully.');
    }
}
