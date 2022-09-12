<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\ObjectiveResource;
use App\Models\Objective;

class ObjectiveController extends Controller
{
    public function index()
    {
        $objectives = Objective::all();

        return ObjectiveResource::collection($objectives);
    }

    public function show(Objective $objective)
    {
        return new ObjectiveResource($objective);
    }
}
