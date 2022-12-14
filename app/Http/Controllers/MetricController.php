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
    public function index(Request $request)
    {
        $request->validate([
            'filter_term' => 'nullable|string|max:191',
            'filter_from' => 'nullable|date_format:Y-m-d',
            'filter_to' => 'nullable|date_format:Y-m-d'
        ]);

        $metrics = Metric::query();

        if($filter_term = $request->query('filter_term')) {
            $metrics->where('term', 'like', "%{$filter_term}%");
        }

        if($filter_from = $request->query('filter_from')) {
            $metrics->where('created_at', '>=', "{$filter_from} 00:00:00");
        }

        if($filter_to = $request->query('filter_to')) {
            $metrics->where('created_at', '<=', "{$filter_to} 23:59:59");
        }

        return view('pages.metrics.index', [
            'metrics'     => $metrics->paginate(),
            'filter_term' => $filter_term,
            'filter_from' => $filter_from,
            'filter_to'   => $filter_to
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

        return redirect()->route('metrics.index')->with('success', 'M??trica cadastrada com sucesso');
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

        return redirect()->route('metrics.index')->with('success', 'M??trica atualizada com sucesso');
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

        return redirect()->route('metrics.index')->with('success', 'M??trica removida com sucesso');
    }
}
