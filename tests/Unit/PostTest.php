<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use App\Post;

class PostTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testListPosts()
    {
        $posts = (new Post)->list();
        $this->assertNotEmpty($cars);
    }
}
