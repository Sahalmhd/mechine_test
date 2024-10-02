<?php

namespace App\Http\Controllers\Api;

use App\Models\Post;
use App\Http\Controllers\Controller;
use App\Http\Requests\StorePostRequest; // Import the StorePostRequest

class PostController extends Controller
{
    // Get all posts
    public function index()
    {
        return response()->json(Post::all(), 200); // Return all posts with a 200 status code
    }

    // Get a single post
    public function show(Post $post)
    {
        return response()->json($post, 200); // Return the requested post with a 200 status code
    }

    // Create a new post
    public function store(StorePostRequest $request) // Use StorePostRequest for validation
    {
        // Create the post with validated data
        $post = Post::create(array_merge($request->validated(), [
            'user_id' => $request->user_id // Include user_id if needed, ensure it's set in the request
        ]));

        return response()->json([
            'success' => true,
            'data' => $post,
            'message' => 'Post created successfully',
        ], 201); // Return a 201 status code for created resource
    }

    // Update a post
    public function update(StorePostRequest $request, Post $post) // Use StorePostRequest for validation
    {
        // Validate and update the post
        $post->update($request->validated());

        return response()->json([
            'success' => true,
            'data' => $post,
            'message' => 'Post updated successfully',
        ], 200); // Return a 200 status code
    }

    // Delete a post
    public function destroy(Post $post)
    {
        // Delete the post
        $post->delete(); // This will throw an error if the post cannot be deleted

        return response()->json(null, 204); // Return no content status
    }
}
