<?php


namespace pouria\Press\Tests\Feature;


use Illuminate\Foundation\Testing\RefreshDatabase;
use pouria\Press\Post;
use pouria\Press\Tests\TestCase;

class SavePostsTest extends TestCase
{
    use RefreshDatabase;
    public function test_a_post_can_be_created_with_the_factory()
    {
        factory(Post::class)->create();
        $this->assertCount(1, Post::all());
    }
}