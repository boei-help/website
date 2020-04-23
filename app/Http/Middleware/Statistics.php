<?php

namespace App\Http\Middleware;

use App\Activity;
use App\Visitor;
use Closure;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Cookie;

class Statistics
{
    /**
     * Ensure that incoming requests are being tracked in the statistics
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $visitor = Visitor::getOrCreate();

        $activity = $this->savePageView($visitor, $request);

        return $next($request);
    }

    /**
     * Creates a pageview
     *
     * @param $visitor
     * @param $request
     * @return Activity
     */
    public function savePageView($visitor, $request)
    {
        $activity = new Activity;
        $activity->type = 'page';
        $activity->name = $request->path();
        $activity->query = json_encode($request->query());
        $activity->referer_domain = $visitor->getRefererDomain();
        $activity->referer = $visitor->getReferer();
        $visitor->activities()->save($activity);

        return $activity;
    }
}
