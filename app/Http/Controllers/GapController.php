<?php

namespace App\Http\Controllers;

use App\Models\Gap;
use Illuminate\Http\Request;

class GapController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('page.gap.index', [
            'data' => Gap::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
     * Display the specified resource.
     *
     * @param  \App\Models\Gap  $gap
     * @return \Illuminate\Http\Response
     */
    public function show(Gap $gap)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Gap  $gap
     * @return \Illuminate\Http\Response
     */
    public function edit(Gap $gap)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Gap  $gap
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Gap $gap)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Gap  $gap
     * @return \Illuminate\Http\Response
     */
    public function destroy(Gap $gap)
    {
        //
    }
}
