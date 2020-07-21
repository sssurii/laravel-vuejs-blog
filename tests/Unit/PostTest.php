<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Post;

class PostTest extends TestCase
{

    public function testListPosts()
    {
        $posts = (new Post)->list();
        $this->assertNotEmpty($cars);
    }
}
