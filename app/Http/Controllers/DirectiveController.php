<?php

namespace App\Http\Controllers;

use App\Models\Purpose;
use App\Models\Directive;
use Illuminate\Http\Request;
use App\Http\Requests\DirectiveRequest;

class DirectiveController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.directives.index', [
            'directives' => Directive::paginate()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('pages.directives.create', [
            'purpose_id' => $request->query('purpose_id'),
            'purposes'   => Purpose::select(['id', 'name'])->get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DirectiveRequest $request)
    {
        $directive = Directive::create($request->validated());

        session()->flash('success', 'Diretriz cadastrada com sucesso!');

        if ($request->input('submit_type') === 'next') {
            return redirect()->route('objectives.create', ['directive_id' => $directive->id]);
        } else {
            return back();
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Directive $directive
     * @return \Illuminate\Http\Response
     */
    public function update(DirectiveRequest $request, Directive $directive)
    {
        $directive->update($request->validated());

        return redirect()->route('directives.index')->with('success', 'Diretriz atualizada com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Directive $directive
     * @return \Illuminate\Http\Response
     */
    public function destroy(Directive $directive)
    {
        $directive->delete();

        return redirect()->route('directives.index')->with('success', 'Diretriz removida com sucesso!');
    }
}
