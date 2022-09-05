<?php

namespace App\Http\Controllers;

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
    public function store(Request $request)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Directive $directive
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Directive $directive)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Directive $directive
     * @return \Illuminate\Http\Response
     */
    public function destroy(Directive $directive)
    {
        //
    }
}
