<?php

namespace App\Http\Controllers;

use App\Models\Profil_standar;
use Illuminate\Http\Request;

class ProfilStandarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('page.profil_standar.index', [
            'data' => Profil_standar::all(),
            'route' => 'profil_standar.update'
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
     * @param  \App\Models\Profil_standar  $profil_standar
     * @return \Illuminate\Http\Response
     */
    public function show(Profil_standar $profil_standar)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Profil_standar  $profil_standar
     * @return \Illuminate\Http\Response
     */
    public function edit(Profil_standar $profil_standar)
    {
        return view('page.profil_standar.form',[
            'row' => $profil_standar,
            'route' => 'profil_standar.update'
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Profil_standar  $profil_standar
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Profil_standar $profil_standar)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Profil_standar  $profil_standar
     * @return \Illuminate\Http\Response
     */
    public function destroy(Profil_standar $profil_standar)
    {
        //
    }
}
