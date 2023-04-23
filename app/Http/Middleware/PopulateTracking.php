<?php

namespace App\Http\Middleware;

use App\Services\TrackingService;
use Closure;
use Illuminate\Http\Request;

class PopulateTracking
{
    private TrackingService $service;

    public function __construct(TrackingService $service)
    {
        $this->service = $service;
    }

    public function handle(Request $request, Closure $next)
    {
        if (auth()->check()) {
            $this->service->populateTrackingDbIfEmpty(auth()->user()->id);
        } else {
            $this->service->populateTrackingSessionIfEmpty();
        }

        return $next($request);
    }
}
