<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\CompanyStats;

class CompanyStatsController extends Controller
{
    public function show()
    {
        $stats = CompanyStats::first();

        return response()->json([
            'status' => 'success',
            'data'   => $stats
        ]);
    }
}
