<?php


namespace pouria\Press;


class Press
{
    public function configNotPublished()
    {
        return is_null(config('press'));
    }

    public function driver()
    {
        $driver = title_case(config('press.driver'));
        $class = 'pouria\\Press\\Drivers\\' . $driver . 'Driver';
        return new $class;
    }

    public function path()
    {
        return config('press.path', 'blogs');
    }

}