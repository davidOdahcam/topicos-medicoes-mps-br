<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\PurposeResource;
use App\Models\Purpose;

class PurposeController extends Controller
{
    public function index()
    {
        $purposes = Purpose::all();

        return PurposeResource::collection($purposes);
    }

    public function show(Purpose $purpose)
    {
        return new PurposeResource($purpose);
    }
}
