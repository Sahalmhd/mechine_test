<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use App\Models\Post; // Import the Post model
use Illuminate\Foundation\Testing\RefreshDatabase;

class PostApiTest extends TestCase
{
    use RefreshDatabase; // Use the RefreshDatabase trait to handle database transactions

    public function test_api_can_create_post()
    {
        // Arrange
        $user = User::factory()->create(); // Create a user using the factory

        // Prepare the post data
        $data = [
            'title' => 'Test Post',
            'body' => 'This is a test post.',
            'user_id' => $user->id, // Use the created user's ID
        ];

        // Act
        $response = $this->actingAs($user, 'api')->postJson('/api/posts', $data);

        // Assert the post was successfully created
        $response->assertStatus(201);
        $this->assertDatabaseHas('posts', [
            'title' => 'Test Post',
            'body' => 'This is a test post.',
            'user_id' => $user->id, // Check against the created user's ID
        ]);
    }
}
