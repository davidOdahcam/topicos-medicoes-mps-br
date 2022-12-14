<?php

namespace App\Http\Controllers;

use App\Models\Directive;
use App\Models\Objective;
use Illuminate\Http\Request;
use App\Http\Requests\ObjectiveRequest;

class ObjectiveController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $request->validate([
            'filter_name' => 'nullable|string|max:191',
            'filter_from' => 'nullable|date_format:Y-m-d',
            'filter_to' => 'nullable|date_format:Y-m-d'
        ]);

        $objectives = Objective::query();

        if($filter_name = $request->query('filter_name')) {
            $objectives->where('name', 'like', "%{$filter_name}%");
        }

        if($filter_from = $request->query('filter_from')) {
            $objectives->where('created_at', '>=', "{$filter_from} 00:00:00");
        }

        if($filter_to = $request->query('filter_to')) {
            $objectives->where('created_at', '<=', "{$filter_to} 23:59:59");
        }

        return view('pages.objectives.index', [
            'objectives' => $objectives->paginate(),
            'filter_name' => $filter_name,
            'filter_from' => $filter_from,
            'filter_to' => $filter_to
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $purpose_id = $request->query('purpose_id');

        $directives = Directive::select(['id', 'name'])->when($purpose_id, function ($query, $purpose_id) {
            $query->whereHas('purposes', function ($query) use ($purpose_id) {
                $query->where('id', $purpose_id);
            });
        })->get();

        return view('pages.objectives.create', [
            'directive_id' => $request->query('directive_id'),
            'directives'   => $directives
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ObjectiveRequest $request)
    {
        $objective = Objective::create($request->validated());
        $objective->directives()->attach($request->input('directive_id'));

        session()->flash('success', 'Objetivo cadastrado com sucesso');

        if ($request->input('submit_type') === 'next') {
            return redirect()->route('metrics.create', ['objective_id' => $objective->id]);
        } else {
            return back();
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ObjectiveRequest $request, Objective $objective)
    {
        $objective->update($request->validated());

        return redirect()->route('objectives.index')->with('success', 'Objetivo atualizado com sucesso');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Objective $objective)
    {
        $objective->delete();

        return redirect()->route('objectives.index')->with('success', 'Objetivo removido com sucesso');
    }
}
