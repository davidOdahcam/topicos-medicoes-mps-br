<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Purpose;
use Illuminate\Http\Request;
use App\Http\Requests\PurposeRequest;

class PurposeController extends Controller
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

        $purposes = Purpose::with('project')->withCount('directives');

        if($filter_project_id = $request->query('filter_project_id')) {
            $purposes->where('project_id', $filter_project_id);
        }

        if($filter_name = $request->query('filter_name')) {
            $purposes->where('name', 'like', "%{$filter_name}%");
        }

        if($filter_from = $request->query('filter_from')) {
            $purposes->where('created_at', '>=', "{$filter_from} 00:00:00");
        }

        if($filter_to = $request->query('filter_to')) {
            $purposes->where('created_at', '<=', "{$filter_to} 23:59:59");
        }

        return view('pages.purposes.index', [
            'projects'          => Project::select(['id', 'name'])->get(),
            'filter_project_id' => $filter_project_id,
            'filter_name'       => $filter_name,
            'filter_from'       => $filter_from,
            'filter_to'         => $filter_to,
            'purposes'          => $purposes->paginate()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('pages.purposes.create', [
            'project_id' => $request->query('project_id'),
            'projects'   => Project::select(['id', 'name'])->get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PurposeRequest $request)
    {
        $purpose = Purpose::create($request->validated());

        session()->flash('success', 'Prop??sito cadastrado com sucesso');

        if ($request->input('submit_type') === 'next') {
            return redirect()->route('directives.create', ['purpose_id' => $purpose->id]);
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
    public function update(PurposeRequest $request, Purpose $purpose)
    {
        $purpose->update($request->validated());

        return back()->with('success', 'Prop??sito atualizado com sucesso');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Purpose $purpose)
    {
        $purpose->delete();

        return back()->with('success', 'Prop??sito removido com sucesso');
    }
}
