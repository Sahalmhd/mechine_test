<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Http\Requests\StorePostRequest; // Import StorePostRequest
use App\Http\Requests\UpdatePostRequest; // Import UpdatePostRequest
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    // Display a listing of the posts
    public function index()
    {
        $posts = Post::with('user')->get(); // Ensure user relationship is defined in the Post model
        return view('posts.index', compact('posts'));
    }

    // Show the form for creating a new post
    public function create()
    {
        return view('posts.create');
    }

    // Store a newly created post in storage
    public function store(StorePostRequest $request) // Use StorePostRequest for validation
    {
        // Create a new post with the authenticated user's ID
        Post::create([
            'title' => $request->title,
            'body' => $request->body,
            'user_id' => Auth::id(), // Set the user ID to the currently authenticated user's ID
            // You can also set admin_id here if needed
        ]);
    
        return redirect()->route('posts.index')->with('success', 'Post created successfully.');
    }   

    // Display the specified post
    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }

    // Show the form for editing the specified post
    public function edit(Post $post)
    {
        return view('posts.edit', compact('post'));
    }

    // Update the specified post in storage
    public function update(UpdatePostRequest $request, Post $post) // Use UpdatePostRequest for validation
    {
        $post->update($request->only('title', 'body', 'user_id')); // 'user_id' can be null, so we handle it accordingly

        return redirect()->route('posts.index')->with('success', 'Post updated successfully.');
    }

    // Remove the specified post from storage
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('posts.index')->with('success', 'Post deleted successfully.');
    }
}
