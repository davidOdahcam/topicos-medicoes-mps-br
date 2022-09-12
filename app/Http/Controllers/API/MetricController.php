<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\MetricResource;
use App\Models\Metric;

class MetricController extends Controller
{
    public function index()
    {
        $metrics = Metric::all();

        return MetricResource::collection($metrics);
    }

    public function show(Metric $metric)
    {
        return new MetricResource($metric);
    }
}
