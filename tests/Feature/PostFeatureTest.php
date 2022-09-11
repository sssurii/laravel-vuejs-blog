<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Post;

class PostFeatureTest extends TestCase
{
    use WithFaker;

    private $post;

    public function setUp(): void
    {
        parent::setUp();

        $this->post = Post::factory()->create();
    }

    public function testPostsListApi()
    {
        $response = $this->get('api/posts');

        $response->assertStatus(200);
    }

    public function testPostViewApi()
    {
        $response = $this->get('api/post/' . $this->post->id);
        $response->assertStatus(200);
        $response->assertJsonPath('title', $this->post->title);
    }

    public function testPostViewApiWithNonExistingId()
    {
        $response = $this->get('api/post/' . ($this->post->id + 10));
        $response->assertStatus(404);
    }

    public function testPostCreateAPI()
    {
        $data = [
            'title' => $this->faker->sentence($nbWords = 6, $variableNbWords = true),
            'content' => $this->faker->realText($this->faker->numberBetween(10, 200))
        ];
        $response = $this->post('api/post/create', $data);
        $response->assertStatus(201);
        $response->assertJsonPath('title', $data['title']);
    }
}
