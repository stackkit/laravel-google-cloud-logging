<?php

declare(strict_types=1);

namespace Stackkit\LaravelGoogleCloudLogging;

use Google\Cloud\Logging\LoggingClient;
use Google\Cloud\Logging\PsrLogger;

class ViaGoogleCloudLogger
{
    public function __invoke(array $config): PsrLogger
    {
        $logger = LoggingClient::psrBatchLogger('app', [
            'clientConfig' => [
                'projectId' => $config['project_id'],
            ],
            'resource' => $this->resource($config),
            'labels' => [
                'source' => 'laravel-log',
            ],
        ]);

        return $logger;
    }

    private function resource(array $config): array
    {
        if (env('K_SERVICE') && env('K_REVISION')) {
            return [
                'type' => 'cloud_run_revision',
                'labels' => [
                    'projectId' => $config['project_id'],
                    'service_name' => env('K_SERVICE'),
                    'revision_name' => env('K_REVISION'),
                ]
            ];
        }

        return [];
    }
}
