<?php

namespace App\Http\Controllers;

use App\Models\Kriteria;
use App\Models\Profil_standar;
use App\Models\Sub_kriteria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
            'kriteria' => Kriteria::all(),
            'sub_kriteria' => Sub_kriteria::where('kriteria_id', $profil_standar->kriteria_id)->get(),
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

        DB::table('tb_profil_standar')
            ->where('profil_standar_id', $profil_standar->profil_standar_id)
            ->update([
                'sub_kriteria_id' => $request->sub_kriteria_id
            ]);
        return redirect()
            ->route('profil_standar.index')
            ->with('message', 'Data berhasil di update');
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
