<?php


namespace pouria\Press\Console;


use Illuminate\Console\Command;
use pouria\Press\Facades\Press;
use pouria\Press\Post;

class ProcessCommand extends Command
{
    protected $signature = 'press:process';

    protected $description = 'Updates blog posts.';

    public function handle()
    {
        if (Press::configNotPublished()) {
            return $this->warn('Please publish the config file by running \'php artisan vendor:publish --tag=press-config\'');
        }

        try {
            $posts = Press::driver()->fetchPosts();
            foreach ($posts as $post) {
                Post::create([
                    'identifier' => str_random(),
                    'slug' => str_slug($post['title']),
                    'title' => $post['title'],
                    'body' => $post['body'],
                    'extra' => $post['extra'] ?? '',
                ]);
            }
        }catch (\Exception $e){
            $this->error($e->getMessage());
        }
    }

}