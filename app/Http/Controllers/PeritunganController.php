<?php

namespace App\Http\Controllers;

use App\Models\Kriteria;
use App\Models\Peritungan;
use App\Models\Sub_kriteria;
use App\Models\Supplier;
use Illuminate\Http\Request;

class PeritunganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('page.penilaian.index', [
            'data' => Peritungan::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $sub = Sub_kriteria::all();
        $sup = Peritungan::pluck('supplier_id');
        $supNot = Supplier::whereNotIn('supplier_id', $sup)->get();
        return view('page.penilaian.form', [
            'data'         => Peritungan::latest('perhitungan_id', 'DESC')->take(3)->get(),
            'dataKriteria' => Kriteria::all(),
            'c1'           => $sub->where('kriteria_id', 1),
            'c2'           => $sub->where('kriteria_id', 2),
            'c3'           => $sub->where('kriteria_id', 3),
            'c4'           => $sub->where('kriteria_id', 4),
            'suppliers'    => $supNot,
            'route'        => 'penilaian.store'
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Peritungan  $peritungan
     * @return \Illuminate\Http\Response
     */
    public function show(Peritungan $peritungan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Peritungan  $peritungan
     * @return \Illuminate\Http\Response
     */
    public function edit(Peritungan $peritungan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Peritungan  $peritungan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Peritungan $peritungan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Peritungan  $peritungan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Peritungan $peritungan)
    {
        //
    }
}
