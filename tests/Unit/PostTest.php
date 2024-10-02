<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Post;
use App\Models\User; // Import the User model
use Illuminate\Foundation\Testing\RefreshDatabase;

class PostTest extends TestCase
{
    use RefreshDatabase; // Use the RefreshDatabase trait to handle database transactions

    public function test_create_post()
    {
        // Arrange
        $user = User::factory()->create(); // Create a user using the factory

        $data = [
            'title' => 'Test Post',
            'body' => 'This is a test post.',
            'user_id' => $user->id, // Use the created user's ID
        ];

        // Act
        $post = Post::create($data);

        // Assert
        $this->assertInstanceOf(Post::class, $post);
        $this->assertEquals('Test Post', $post->title);
        $this->assertEquals('This is a test post.', $post->body);
        $this->assertEquals($user->id, $post->user_id); // Check against the created user's ID
    }
}
