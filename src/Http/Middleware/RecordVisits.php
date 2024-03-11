<?php

namespace MichelMelo\LaravelVisitorsStatistics\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use MichelMelo\LaravelVisitorsStatistics\Tracker;

class RecordVisits
{
    /**
     * @var Tracker
     */
    private $tracker;

    /**
     * RecordVisits constructor.
     *
     * @param Tracker $tracker
     */
    public function __construct(Tracker $tracker)
    {
        $this->tracker = $tracker;
    }

    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $this->tracker->recordVisit();

        return $next($request);
    }
}
