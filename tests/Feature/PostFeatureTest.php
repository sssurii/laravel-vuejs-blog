<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Post;

class PostFeatureTest extends TestCase
{
    private $post;
    
    public function setUp(): void
    {
        parent::setUp();
       
        $this->post = factory(Post::class)->create();
    }

    public function testPostsListApi()
    {
        $response = $this->get('api/posts');

        $response->assertStatus(200);
    }

    public function testPostViewApi()
    {
        $response = $this->get('api/post/'. $this->post->id);
        $response->assertStatus(200);
        $response->assertJsonPath('title', $this->post->title);
    }
}
