<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\DirectiveResource;
use App\Models\Directive;

class DirectiveController extends Controller
{
    public function index()
    {
        $directives = Directive::all();

        return DirectiveResource::collection($directives);
    }

    public function show(Directive $directive)
    {
        return new DirectiveResource($directive);
    }
}
