<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    ProjectController,
    PurposeController,
    DirectiveController,
    ObjectiveController,
    MetricController
};
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::middleware(['auth'])->group(function () {
    Route::get('/', function () {
        return view('pages.directives.index');
    });

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->middleware(['auth'])->name('dashboard');

    Route::resource('projetos', ProjectController::class)
        ->except(['show', 'edit'])
        ->names('projects')
        ->parameters(['projetos' => 'project:id']);

    Route::resource('propositos', PurposeController::class)
        ->except(['show', 'edit'])
        ->names('purposes')
        ->parameters(['propositos' => 'purpose:id']);

    Route::resource('diretrizes', DirectiveController::class)
        ->except(['show', 'edit'])
        ->names('directives')
        ->parameters(['diretrizes' => 'directive:id']);

    Route::resource('objetivos', ObjectiveController::class)
        ->except(['show', 'edit'])
        ->names('objectives')
        ->parameters(['objetivos' => 'objective:id']);

    Route::resource('metricas', MetricController::class)
        ->except(['show', 'edit'])
        ->names('metrics')
        ->parameters(['metricas' => 'metric:id']);
});

require __DIR__.'/auth.php';
