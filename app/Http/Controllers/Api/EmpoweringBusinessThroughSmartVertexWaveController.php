<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\EmpoweringBusinessThroughSmartVertexWave;

class EmpoweringBusinessThroughSmartVertexWaveController extends Controller
{
    public function show()
    {
        return EmpoweringBusinessThroughSmartVertexWave::first();
    }
}
