<?php

namespace Src\Metrics\Infrastructure\Actions;

use App\Http\Controllers\Controller;
use Src\Metrics\Domain\Metric;
use Symfony\Component\HttpFoundation\Response;

class GetMetricsAction extends Controller
{
    public function __invoke()
    {
        $metrics = collect([]);
        Metric::groupBy('slug')->pluck('slug')
            ->map(function ($slug) use ($metrics) {
                $metricsBySlug = Metric::where('slug', $slug)->get();
                $metrics[$slug] = [
                    'count' => $metricsBySlug->count(),
                    'successful' => $metricsBySlug->where('http_code', '<', Response::HTTP_BAD_REQUEST)->count(),
                    'failed' => $metricsBySlug->where('http_code', '>=', Response::HTTP_BAD_REQUEST)->count(),
                    'min_delivery_time' => $metricsBySlug->min('response_time'),
                    'max_delivery_time' => $metricsBySlug->max('response_time'),
                    'avg_delivery_time' => $metricsBySlug->avg('response_time'),
                ];
            });

        return $metrics;
    }
}
