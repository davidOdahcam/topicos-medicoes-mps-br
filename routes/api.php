<?php

use App\Http\Controllers\API\MetricController;
use App\Http\Controllers\API\ObjectiveController;
use App\Http\Controllers\API\DirectiveController;
use App\Http\Controllers\API\PurposeController;
use App\Http\Controllers\API\ProjectController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource('metrics', MetricController::class)->only(['index', 'show'])->names('metrics');
Route::apiResource('objectives', ObjectiveController::class)->only(['index', 'show'])->names('objectives');
Route::apiResource('directives', DirectiveController::class)->only(['index', 'show'])->names('directives');
Route::apiResource('purposes', PurposeController::class)->only(['index', 'show'])->names('purposes');
Route::apiResource('projects', ProjectController::class)->only(['index', 'show'])->names('projects');
