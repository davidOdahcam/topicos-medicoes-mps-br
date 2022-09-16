<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\PurposeResource;
use App\Models\Purpose;
use Illuminate\Http\Request;

class PurposeController extends Controller
{
    public function index(Request $request)
    {
        $purposes = Purpose::query();

        if($filter_project_id = $request->query('filter_project_id')) {
            $purposes->where('project_id', $filter_project_id);
        }

        return PurposeResource::collection($purposes->get());
    }

    public function show(Purpose $purpose)
    {
        return new PurposeResource($purpose);
    }
}
