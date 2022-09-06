<?php

namespace App\Http\Controllers;

use App\Http\Requests\PurposeRequest;
use App\Models\Project;
use App\Models\Purpose;
use Illuminate\Http\Request;

class PurposeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.purposes.index', [
            'purposes' => Purpose::paginate()
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

        return back();
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

        return back();
    }
}
