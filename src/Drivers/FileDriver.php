<?php


namespace pouria\Press\Drivers;


use Illuminate\Support\Facades\File;
use pouria\Press\PressFileParser;

class FileDriver
{

    public function fetchPosts()
    {
        $files = File::files(config('press.path'));
        $posts = [];
        foreach ($files as $file) {
            $posts[] = (new PressFileParser($file->getPathname()))->getData();
        }
    }
}