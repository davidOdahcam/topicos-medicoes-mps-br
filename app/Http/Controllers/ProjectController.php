<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use App\Http\Requests\ProjectRequest;

class ProjectController extends Controller
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

        $projects = Project::query();

        if($filter_name = $request->query('filter_name')) {
            $projects->where('name', 'like', "%{$filter_name}%");
        }

        if($filter_from = $request->query('filter_from')) {
            $projects->where('created_at', '>=', "{$filter_from} 00:00:00");
        }

        if($filter_to = $request->query('filter_to')) {
            $projects->where('created_at', '<=', "{$filter_to} 23:59:59");
        }

        return view('pages.projects.index', [
            'projects' => $projects->paginate(),
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
    public function create()
    {
        return view('pages.projects.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProjectRequest $request)
    {
        $project = new Project($request->validated());
        $project->save();

        session()->flash('success', 'Projeto cadastrado com sucesso');

        if ($request->input('submit_type') === 'next') {
            return redirect()->route('purposes.create', ['project_id' => $project->id]);
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
    public function update(ProjectRequest $request, Project $project)
    {
        $project->update($request->validated());

        return back()->with('success', 'Projeto atualizado com sucesso');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        $project->delete();

        return back()->with('success', 'Projeto removido com sucesso');
    }
}
