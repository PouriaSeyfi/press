<?php


namespace pouria\Press\Repositories;


use pouria\Press\Post;

class PostRepository
{

    public function save($post)
    {
        Post::updateOrCreate([
            'identifier' => $post['identifier']
        ], [
            'slug' => str_slug($post['title']),
            'title' => $post['title'],
            'body' => $post['body'],
            'extra' => $post['extra'] ?? json_encode([]),
        ]);
    }

}