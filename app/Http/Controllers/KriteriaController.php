<?php

namespace App\Http\Controllers;

use App\Models\Kriteria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class KriteriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('page.kriteria.index', [
            'data' => Kriteria::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('page.kriteria.form', [
            'data' => Kriteria::latest('kriteria_id', 'DESC')->take(3)->get(),
            'route' => 'kriteria.store'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'kriteria_nama'   => 'required',
            'kriteria_jenis'  => 'required',
            'kriteria_bobot'  => 'required|numeric',
        ], [
            'required' => ':attribute harus di isi',
            'numeric' => ':attribute harus berupa angka'
        ]);

        if ($validator->fails()) {
            return redirect()
                ->route('kriteria.create')
                ->with('message', 'Data gagal di simpan')
                ->withErrors($validator)
                ->withInput();
        }
        Kriteria::create($request->all());

        return redirect()
            ->route('kriteria.index')
            ->with('message', 'Data berhasil di simpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\kriteria  $kriteria
     * @return \Illuminate\Http\Response
     */
    public function show(Kriteria $kriteria)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\kriteria  $kriteria
     * @return \Illuminate\Http\Response
     */
    public function edit(Kriteria $kriteria)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\kriteria  $kriteria
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Kriteria $kriteria)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\kriteria  $kriteria
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Kriteria::where('kriteria_id', $id)->delete();
        return redirect()
            ->route('kriteria.index')
            ->with('message', 'Data berhasil di hapus');
    }
}
