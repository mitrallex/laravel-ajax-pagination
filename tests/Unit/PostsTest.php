<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PostsTest extends TestCase
{
    use RefreshDatabase;
        
    protected $post;
    
    public function setUp()
    {
        parent::setUp();
        $this->post = factory(\App\Post::class)->create();
    }

    /**
     * Check Json data
     *
     * @return void
     */
    public function testFetchJsonData() : void
    {
        $response = $this->get('/posts');
        $response->assertJsonFragment([
                'id' => $this->post->id,
                'title' => $this->post->title,
                'body' => $this->post->body
        ]);
    }

    /**
     * Check number of posts
     *
     * @return void
     */
    public function testCheckNumberOfPosts() : void
    {
        $response = $this->getJson('/posts')->json();
        $this->assertEquals(1, $response['pagination']['total']);
    }
}
