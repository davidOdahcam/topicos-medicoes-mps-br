<?php

namespace App\Http\Controllers;

use App\Http\Requests\DirectiveRequest;
use App\Models\Directive;
use Illuminate\Http\Request;

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
    public function create()
    {
        return view('pages.directives.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DirectiveRequest $request)
    {
        Directive::create($request->validated());

        return redirect()->route('directives.index');
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

        return redirect()->route('directives.index');
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

        return redirect()->route('directives.index');
    }
}
