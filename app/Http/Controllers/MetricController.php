<?php

namespace App\Http\Controllers;

use App\Models\Metric;
use App\Models\Objective;
use Illuminate\Http\Request;
use App\Http\Requests\MetricRequest;

class MetricController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.metrics.index', [
            'metrics' => Metric::paginate()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('pages.metrics.create', [
            'objective_id' => $request->query('objective_id'),
            'objectives'   => Objective::select(['id', 'name'])->get(),
            'metrics'      => Metric::select(['id', 'term'])->get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MetricRequest $request)
    {
        $metric = Metric::create($request->validated());
        $metric->objectives()->attach($request->input('objective_id'));

        return redirect()->route('metrics.index')->with('success', 'Métrica cadastrada com sucesso');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(MetricRequest $request, Metric $metric)
    {
        $metric->update($request->validated());

        return redirect()->route('metrics.index')->with('success', 'Métrica atualizada com sucesso');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Metric $metric)
    {
        $metric->delete();

        return redirect()->route('metrics.index')->with('success', 'Métrica removida com sucesso');
    }
}
