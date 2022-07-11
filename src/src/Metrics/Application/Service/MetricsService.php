<?php

namespace Src\Metrics\Application\Service;

use Src\Metrics\Domain\Metric;
use Src\Metrics\Domain\ValueObject\MetricsData;

class MetricsService
{
    public function store(MetricsData $metricsData)
    {
        Metric::create([
            'slug' => $metricsData->getSlug(),
            'response_time' => $metricsData->getResponseTime(),
            'http_code' => $metricsData->getHttpCode(),
        ]);
    }
}
