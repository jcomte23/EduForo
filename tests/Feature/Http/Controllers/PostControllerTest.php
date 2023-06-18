<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PostControllerTest extends TestCase
{
    use WithFaker, RefreshDatabase;

    public function test_connection_post_without_login(): void
    {
        /*index*/
        $this->get('post')->assertRedirect('login');
        /*show*/
        $this->get('post/1')->assertRedirect('login');
        /*create*/
        $this->get('post/create')->assertRedirect('login');
        /*store*/
        $this->post('post', [])->assertRedirect('login');
        /*edit*/
        $this->get('post/1/edit')->assertRedirect('login');
        /*update*/
        $this->put('post/1')->assertRedirect('login');
        /*delete*/
        $this->delete('post/1')->assertRedirect('login');
    }

    public function test_method_index_empty()
    {
        Post::factory()->create();
        $user = User::factory()->create();

        $this
            ->actingAs($user)
            ->get('post')
            ->assertStatus(200)
            ->assertSee('No hay publicaciones creadas');
    }

    public function test_method_index_with_data()
    {
        $user = User::factory()->create();
        $post = Post::factory()->create(['user_id' => $user->id]);

        $this
            ->actingAs($user)
            ->get('post')
            ->assertStatus(200)
            ->assertSee($post->id);
    }

    public function test_validation_policy_method_show()
    {
        $user = User::factory()->create();
        $post = Post::factory()->create();

        $this
            ->actingAs($user)
            ->get("post/$post->id")
            ->assertStatus(403);
    }

    public function test_method_show()
    {
        $user = User::factory()->create();
        $post = Post::factory()->create(['user_id' => $user->id]);

        $this
            ->actingAs($user)
            ->get("post/$post->id")
            ->assertStatus(200);
    }

    public function test_validation_policy_method_edit()
    {
        $user = User::factory()->create();
        $post = Post::factory()->create();

        $this
            ->actingAs($user)
            ->get("post/$post->id/edit")
            ->assertStatus(403);
    }

    public function test_method_edit()
    {
        $user = User::factory()->create();
        $post = Post::factory()->create(['user_id' => $user->id]);

        $this
            ->actingAs($user)
            ->get("post/$post->id/edit")
            ->assertStatus(200)
            ->assertSee($post->id);
    }

    public function test_method_create()
    {
        $user = User::factory()->create();

        $this
            ->actingAs($user)
            ->get("post/create")
            ->assertStatus(200);
    }

    public function test_validation_data_method_store_()
    {
        $user = User::factory()->create();

        $this
            ->actingAs($user)
            ->post('post', [])
            ->assertStatus(302)
            ->assertSessionHasErrors(['datePost', 'message']);
    }

    public function test_method_store()
    {
        $data = [
            'datePost' => $this->faker->date,
            'message' => $this->faker->sentence(),
        ];

        $user = User::factory()->create();

        $this->actingAs($user)->post('post', $data)->assertRedirect('post');

        $this->assertDatabaseHas('posts', $data);
    }

    public function test_validation_data_method_update()
    {
        $post = Post::factory()->create();
        $user = User::factory()->create();

        $this
            ->actingAs($user)
            ->put("post/{$post->id}", [])
            ->assertStatus(302)
            ->assertSessionHasErrors(['datePost', 'message']);
    }

    public function test_validation_policy_method_update()
    {
        $user = User::factory()->create();
        $post = Post::factory()->create();
        $data = [
            'datePost' => $this->faker->date,
            'message' => $this->faker->sentence(),
        ];

        $this
            ->actingAs($user)
            ->put("post/{$post->id}", $data)
            ->assertStatus(403);
    }

    public function test_method_update()
    {
        $user = User::factory()->create();
        $post = Post::factory()->create(['user_id' => $user->id]);
        $data = [
            'datePost' => $this->faker->date,
            'message' => $this->faker->sentence(),
        ];

        $this
            ->actingAs($user)
            ->put("post/{$post->id}", $data)
            ->assertRedirect('post');

        $this->assertDatabaseHas('posts', $data);
    }

    public function test_validation_policy_destroy()
    {
        $user = User::factory()->create();
        $post = Post::factory()->create();

        $this
            ->actingAs($user)
            ->delete("post/{$post->id}")
            ->assertStatus(403);
    }

    public function test_method_destroy()
    {
        $user = User::factory()->create();
        $post = Post::factory()->create(['user_id' => $user->id]);

        $this
            ->actingAs($user)
            ->delete("post/{$post->id}")
            ->assertRedirect('post');

        $this->assertDatabaseMissing('posts', $post->toArray());
    }
}
