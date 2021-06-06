<?php


namespace pouria\Press\Drivers;


use Illuminate\Support\Facades\File;
use pouria\Press\Exceptions\FileDriverDirectoryNotFoundException;
use pouria\Press\PressFileParser;

class FileDriver extends Driver
{

    public function fetchPosts()
    {
        $files = File::files($this->config['path']);
        foreach ($files as $file) {
            $this->parse($file->getPathname(),$file->getFilename());
        }
        return $this->posts;
    }

    protected function validateSource()
    {
        if (!File::exists($this->config['path'])) {
            throw new FileDriverDirectoryNotFoundException(
                'Directory at \'' . $this->config['path'] . '\' does not exists.' .
                'Check the directory path in the config file'
            );
        }

    }
}