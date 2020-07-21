<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PostFeatureTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testPostsListApi()
    {
        $response = $this->get('api/posts');

        $response->assertStatus(200);
    }
}
