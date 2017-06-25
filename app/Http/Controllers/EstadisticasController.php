<?php

namespace Cpanel\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Analytics\Period;
use Carbon\Carbon;

use Analytics;

class EstadisticasController extends Controller
{
	public function visitorsAndPageViews($startDate = null, $endDate = null)
	{
		$startDate = (!$startDate) ? Carbon::now()->subYear() : $startDate;
		$endDate = (!$endDate) ? Carbon::now() : $endDate;

		$periodo = Period::create($startDate, $endDate);
		$analyticsData = Analytics::fetchTopReferrers($periodo);
		dd($analyticsData);
		return response()->json(Analytics::getAnalyticsService());
		return response()->json($analyticsData);
	}

	public function totalVisitorsAndPageViews($startDate = null, $endDate = null)
	{
		$startDate = (!$startDate) ? Carbon::now()->subMonth() : $startDate;
		$endDate = (!$endDate) ? Carbon::now() : $endDate;

		$periodo = Period::create($startDate, $endDate);
		$analyticsData = Analytics::fetchTotalVisitorsAndPageViews($periodo);
		return response()->json($analyticsData);

	}

	public function mostVisitedPages($startDate = null, $endDate = null, int $maxResults = 20)
	{
		$periodo = Period::create($startDate, $endDate);

	}

	public function topReferrers($startDate = null, $endDate = null, int $maxResults = 20)
	{
		$periodo = Period::create($startDate, $endDate);

	}

	public function topBrowsers($startDate = null, $endDate = null, int $maxResults = 10)
	{
		$periodo = Period::create($startDate, $endDate);

	}

	public function performQuery($startDate = null, $endDate = null, string $metrics, array $others = [])
	{
		$periodo = Period::create($startDate, $endDate);

	}
}
