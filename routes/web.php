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

Route::get('/', function () {
    return view('pages.directives.index');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::resource('projetos', ProjectController::class)
    ->except(['show', 'edit'])
    ->names('projects')
    ->scoped(['project' => 'id']);

Route::resource('propositos', PurposeController::class)
    ->except(['show', 'edit'])
    ->names('purposes')
    ->scoped(['purpose' => 'id']);

Route::resource('diretrizes', DirectiveController::class)
    ->except(['show', 'edit'])
    ->names('directives')
    ->scoped(['directive' => 'id']);

Route::resource('objetivos', ObjectiveController::class)
    ->except(['show', 'edit'])
    ->names('objectives')
    ->scoped(['objective' => 'id']);

Route::resource('metricas', MetricController::class)
    ->except(['show', 'edit'])
    ->names('metrics')
    ->scoped(['metric' => 'id']);


require __DIR__.'/auth.php';
