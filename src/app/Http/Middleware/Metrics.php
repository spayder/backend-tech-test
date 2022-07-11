<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Log;
use Src\Metrics\Application\Service\MetricsService;
use Src\Metrics\Domain\ValueObject\MetricsData;

class Metrics
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        return $next($request);
    }

    public function terminate(Request $request, JsonResponse|Response $response)
    {
        $metricsService = app(MetricsService::class);
        $metricsService->store(MetricsData::from([
            'slug' => last($request->segments()),
            'response_time' => microtime(true) - LARAVEL_START,
            'http_code' => $response->getStatusCode(),
        ]));
    }
}
