<?php

namespace Tests;

class TestCase extends \Orchestra\Testbench\TestCase
{
    protected function getPackageProviders($app)
    {
        return [
            \Stackkit\LaravelGoogleCloudLogging\LoggingServiceProvider::class,
        ];
    }

    protected function defineDatabaseMigrations()
    {
        $this->loadMigrationsFrom(__DIR__ . '/../migrations');
        $this->loadMigrationsFrom(__DIR__ . '/../vendor/orchestra/testbench-core/laravel/migrations');
    }

    protected function getEnvironmentSetUp($app)
    {
//        $app['config']->set('cloud-tasks.dashboard.enabled', false);
    }
}
