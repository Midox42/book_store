<?php

namespace Tests\Feature;

use App\Models\Post;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PostCreationTest extends TestCase
{
    use RefreshDatabase;

    public function test_user_can_create_a_post_with_optional_description(): void
    {
        $response = $this->post(route('posts.store'), [
            'title' => 'My first post',
            'created_by' => 'Alice',
            'description' => '',
        ]);

        $response->assertRedirect(route('posts'));

        $this->assertDatabaseHas('posts', [
            'title' => 'My first post',
            'created_by' => 'Alice',
        ]);

        $post = Post::where('title', 'My first post')->first();
        $this->assertNull($post->description);
    }
}
