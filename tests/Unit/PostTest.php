<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Post;

class PostTest extends TestCase
{
    private $post;
    
    public function setUp(): void
    {
        parent::setUp();

        factory(Post::class)->create();
        $this->post = new Post;
    }

    public function testListPosts()
    {
        $posts = $this->post->list();
        $this->assertNotEmpty($posts);
    }

    public function testViewPost()
    {
        $post = factory(Post::class)->create();
        $posts = $this->post->findById($post->id);
        $this->assertNotEmpty($posts);
    }

    public function testViewPostWithInvalidId()
    {
        $posts = $this->post->findById(999);
        $this->assertEmpty($posts);
    }
}
