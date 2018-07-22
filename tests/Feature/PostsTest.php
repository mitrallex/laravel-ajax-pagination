<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PostsTest extends TestCase
{
    use RefreshDatabase;

    /**
     * User can browse welcome page
     *
     * @return void
     */
    public function testUserCanBrowseWelcomePage() : void
    {
        $response = $this->get('/');
        $response->assertStatus(200);
    }

    /**
     * User can browse posts
     *
     * @return void
     */
    public function testUserCanBrowsePosts() : void
    {
        $post = factory(\App\Post::class)->create();
        $response = $this->get('/posts');
        $response->assertStatus(200)->assertSee($post->title);
    }
}
