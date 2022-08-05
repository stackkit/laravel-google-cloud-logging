<?php

namespace Tests;

use Stackkit\LaravelGoogleCloudLogging\ViaGoogleCloudLogger;

class TestCase extends \Orchestra\Testbench\TestCase
{
    protected function getPackageProviders($app)
    {
        return [];
    }

    protected function getEnvironmentSetUp($app)
    {
        $app['config']->set('logging.channels.googlecloud', [
            'driver' => 'custom',
            'via' => ViaGoogleCloudLogger::class,
            'project_id' => env('GOOGLE_CLOUD_PROJECT_ID'),
        ]);

        $app['config']->set('logging.default', 'googlecloud');
    }
}
