<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Post;
use App\Models\User;

class PostTest extends TestCase
{
    use WithFaker;

    private $post;

    public function setUp(): void
    {
        parent::setUp();

        Post::factory()->create();
        $this->post = new Post;
    }

    public function testListPosts()
    {
        $posts = $this->post->list();
        $this->assertNotEmpty($posts);
    }

    public function testViewPost()
    {
        $post = Post::factory()->create();
        $posts = $this->post->findById($post->id);
        $this->assertNotEmpty($posts);
    }

    public function testViewPostWithInvalidId()
    {
        $posts = $this->post->findById(999);
        $this->assertEmpty($posts);
    }

    public function testAddPost()
    {
        $data = [
            'title' => $this->faker->sentence($nbWords = 6, $variableNbWords = true),
            'content' => $this->faker->realText($this->faker->numberBetween(10, 200)),
            'user_id' => (User::factory()->create())->id,
            'status' => config('constants.STATUS.PUBLISHED'),
            'published_at' => $this->faker->dateTimeBetween($startDate = '-2 years', $endDate = 'now', $timezone = null)
        ];
        $post = $this->post->create($data);
        $this->assertNotEmpty($post);
        $this->assertDatabaseHas('posts', [
            'title' => $data['title'],
        ]);
    }
}
