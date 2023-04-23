<?php

namespace App\Http\Middleware;

use App\Services\TrackingService;
use Closure;
use Illuminate\Http\Request;

class PopulateTracking
{
    public function handle(Request $request, Closure $next)
    {
        $service = new TrackingService();

        if (auth()->check()) {
            $service->populateTrackingDbIfEmpty(auth()->user()->id);
        } else {
            $service->populateTrackingSessionIfEmpty();
        }

        return $next($request);
    }
}
