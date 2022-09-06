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
    public function index()
    {
        return view('pages.objectives.index', [
            'objectives' => Objective::paginate()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('pages.objectives.create', [
            'directive_id' => $request->query('directive_id'),
            'directives'   => Directive::select(['id', 'name'])->get()
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
        $objective->delete()

        return redirect()->route('objectives.index')->with('success', 'Objetivo removido com sucesso');
    }
}
