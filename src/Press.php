<?php


namespace pouria\Press;


class Press
{

    public static function configNotPublished()
    {
        return is_null(config('press'));
    }

    public static function driver()
    {
        $driver = title_case(config('press.driver'));
        $class = 'pouria\\Press\\Drivers\\' . $driver . 'Driver';
        return new $class;
    }

}