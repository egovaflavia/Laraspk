<?php

namespace App\Http\Controllers;

use App\Models\Kriteria;
use App\Models\Sub_kriteria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SubKriteriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('page.sub_kriteria.index', [
            'data' => Sub_kriteria::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('page.sub_kriteria.form', [
            'kriteria' => Kriteria::all(),
            'route' => 'sub_kriteria.store'
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
            'kriteria_id'        => 'required',
            'sub_kriteria_nama'  => 'required',
            'sub_kriteria_nilai' => 'required|numeric',
        ], [
            'required' => ':attribute harus di isi',
            'numeric'  => ':attribute harus berupa angka',
        ]);

        if ($validator->fails()) {
            return redirect()
                ->route('sub_kriteria.create')
                ->with('message', 'Data gagal di simpan')
                ->withErrors($validator)
                ->withInput();
        }

        Sub_kriteria::create($request->all());

        return redirect()
            ->route('sub_kriteria.index')
            ->with('message', 'Data berhasil di simpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Sub_kriteria  $sub_kriteria
     * @return \Illuminate\Http\Response
     */
    public function show(Sub_kriteria $sub_kriteria)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Sub_kriteria  $sub_kriteria
     * @return \Illuminate\Http\Response
     */
    public function edit(Sub_kriteria $sub_kriteria)
    {
        return view('page.sub_kriteria.form',[
            'row'      => $sub_kriteria,
            'data'     => Sub_kriteria::latest('sub_kriteria_id', 'DESC')->take(3)->get(),
            'kriteria' => Kriteria::all(),
            'route'    => 'sub_kriteria.update'
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Sub_kriteria  $sub_kriteria
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sub_kriteria $sub_kriteria)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Sub_kriteria  $sub_kriteria
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sub_kriteria $sub_kriteria)
    {
        $sub_kriteria->delete();
        return redirect()
        ->route('sub_kriteria.index')
        ->with('message', 'Data berhasil di hapus');
    }
}
