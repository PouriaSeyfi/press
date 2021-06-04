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

    protected function getEnvironmentSetUp($app)
    {
        $app['config']->set('database.default','testdb');
        $app['config']->set('database.connections.testdb',[
            'driver' =>'sqlite',
            'database' =>':memory',
        ]);
    }

}