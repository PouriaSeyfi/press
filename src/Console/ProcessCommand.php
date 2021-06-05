<?php


namespace pouria\Press\Console;


use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use pouria\Press\Post;
use pouria\Press\PressFileParser;

class ProcessCommand extends Command
{
    protected $signature = 'press:process';

    protected $description = 'Updates blog posts.';

    public function handle()
    {
        if(is_null(config('press'))){
            return $this->warn('Please publish the config file by running \'php artisan vendor:publish --tag=press-config\'');

        }
        $files = File::files(config('press.path'));
        foreach ($files as $file){
            $post = (new PressFileParser($file->getPathname()))->getData();
        }

        Post::create([
            'identifier' => str_random(),
            'slug' => str_slug($post['title']),
            'title' => $post['title'],
            'body' => $post['body'],
            'extra' => $post['extra'] ?? '',
        ]);

        $this->info('Hello');
    }

}