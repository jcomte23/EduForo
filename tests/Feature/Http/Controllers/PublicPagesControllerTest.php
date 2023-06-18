<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Post;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PublicPagesControllerTest extends TestCase
{
    use WithFaker, RefreshDatabase;

    public function test_page_home(): void
    {
        $post = Post::factory()->create();

        $this
            ->get("/")
            ->assertStatus(200)
            ->assertSee($post->id);
    }
}
