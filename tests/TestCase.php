<?php


namespace pouria\Press\Tests;


use pouria\Press\PressBaseServiceProvider;

class TestCase extends \Orchestra\Testbench\TestCase
{

    protected function getPackageProviders($app)
    {
        return [
            PressBaseServiceProvider::class
        ];
    }

}