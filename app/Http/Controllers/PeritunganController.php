<?php

namespace App\Http\Controllers;

use App\Models\Gap;
use App\Models\Kriteria;
use App\Models\Peritungan;
use App\Models\Profil_standar;
use App\Models\Sub_kriteria;
use App\Models\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

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
            'data'            => Peritungan::latest('perhitungan_id', 'DESC')->take(3)->get(),
            'dataKriteria'    => Kriteria::all(),
            'perhitungan_c1'  => $sub->where('kriteria_id', 1),
            'perhitungan_c2'  => $sub->where('kriteria_id', 2),
            'perhitungan_c3'  => $sub->where('kriteria_id', 3),
            'perhitungan_c4'  => $sub->where('kriteria_id', 4),
            'suppliers'       => $supNot,
            'route'           => 'penilaian.store'
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
            'supplier_id' => 'required',
            'perhitungan_c1' => 'required',
            'perhitungan_c2' => 'required',
            'perhitungan_c3' => 'required',
            'perhitungan_c4' => 'required',
        ], [
            'required' => ':attribute harus di isi'
        ]);

        if ($validator->fails()) {
            return redirect()
                ->route('penilaian.create')
                ->withErrors($validator)
                ->withInput();
        }

        Peritungan::create($request->all());

        return redirect()
                ->route('penilaian.index')
                ->with('message', 'Data berhasil disimpan');
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
    public function edit($id)
    {
        $dataPerhitungan = Peritungan::where('perhitungan_id', $id)->first();
        $sub             = Sub_kriteria::all();
        $sup             = Peritungan::pluck('supplier_id');
        $supNot          = Supplier::whereNotIn('supplier_id', $sup)->get();
        return view('page.penilaian.form',[
            'row'            => $dataPerhitungan,
            'route'          => 'penilaian.update',
            'dataKriteria'   => Kriteria::all(),
            'perhitungan_c1' => $sub->where('kriteria_id', 1),
            'perhitungan_c2' => $sub->where('kriteria_id', 2),
            'perhitungan_c3' => $sub->where('kriteria_id', 3),
            'perhitungan_c4' => $sub->where('kriteria_id', 4),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Peritungan  $peritungan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = Peritungan::find($id);
        $data->update($request->all());

        return redirect()
        ->route('penilaian.index')
        ->with('message', 'Data berhasil di update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Peritungan  $peritungan
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Peritungan::where('perhitungan_id', $id)->first();
        $data->delete();
        return redirect()
                ->route('penilaian.index')
                ->with('message', 'Data berhasil dihapus');
    }

    public function perhitungan()
    {

        $dataPerhitungan = Peritungan::all();
        $profilStandar   = Profil_standar::all();
        $gap             = Gap::all();
        $dataPerhitungan->map(function ($value) use  ($profilStandar, $gap)
        {

            $c1 = (int)$value->relC1->sub_kriteria_nilai - $profilStandar->where('kriteria_id', 1)->first()->relSubKriteria->sub_kriteria_nilai;
            $c2 = (int)$value->relC2->sub_kriteria_nilai - $profilStandar->where('kriteria_id', 2)->first()->relSubKriteria->sub_kriteria_nilai;
            $c3 = (int)$value->relC3->sub_kriteria_nilai - $profilStandar->where('kriteria_id', 3)->first()->relSubKriteria->sub_kriteria_nilai;
            $c4 = (int)$value->relC4->sub_kriteria_nilai - $profilStandar->where('kriteria_id', 4)->first()->relSubKriteria->sub_kriteria_nilai;

            $value->profil_c1 = $profilStandar->where('kriteria_id', 1)->first()->relSubKriteria->sub_kriteria_nilai;
            $value->profil_c2 = $profilStandar->where('kriteria_id', 2)->first()->relSubKriteria->sub_kriteria_nilai;
            $value->profil_c3 = $profilStandar->where('kriteria_id', 3)->first()->relSubKriteria->sub_kriteria_nilai;
            $value->profil_c4 = $profilStandar->where('kriteria_id', 4)->first()->relSubKriteria->sub_kriteria_nilai;

            $value->hasil_profil_c1 = $c1;
            $value->hasil_profil_c2 = $c2;
            $value->hasil_profil_c3 = $c3;
            $value->hasil_profil_c4 = $c4;

            $value->hasil_gap_c1 = $gap->where('gap_selisih', $c1)->first()->gap_bobot;
            $value->hasil_gap_c2 = $gap->where('gap_selisih', $c2)->first()->gap_bobot;
            $value->hasil_gap_c3 = $gap->where('gap_selisih', $c3)->first()->gap_bobot;
            $value->hasil_gap_c4 = $gap->where('gap_selisih', $c4)->first()->gap_bobot;

            $core   = ($gap->where('gap_selisih', $c1)->first()->gap_bobot + $gap->where('gap_selisih', $c2)->first()->gap_bobot) / 2;
            $second = ($gap->where('gap_selisih', $c3)->first()->gap_bobot + $gap->where('gap_selisih', $c4)->first()->gap_bobot) / 2;

            $value->hasil_core   = $core;
            $value->hasil_second = $second;

            $value->total = ($core * 0.6) + ($second * 0.4);
        });
        return view('page.perhitungan.index', [
            'data' => Peritungan::all(),
            'dataProfil' => Profil_standar::all(),
            'dataPerhitungan' => $dataPerhitungan
        ]);
    }

    public function hasil()
    {

        $dataPerhitungan = Peritungan::all();
        $profilStandar = Profil_standar::all();
        $gap = Gap::all();
        $dataPerhitungan->map(function ($value) use  ($profilStandar, $gap)
        {

            $c1 = (int)$value->relC1->sub_kriteria_nilai - $profilStandar->where('kriteria_id', 1)->first()->relSubKriteria->sub_kriteria_nilai;
            $c2 = (int)$value->relC2->sub_kriteria_nilai - $profilStandar->where('kriteria_id', 2)->first()->relSubKriteria->sub_kriteria_nilai;
            $c3 = (int)$value->relC3->sub_kriteria_nilai - $profilStandar->where('kriteria_id', 3)->first()->relSubKriteria->sub_kriteria_nilai;
            $c4 = (int)$value->relC4->sub_kriteria_nilai - $profilStandar->where('kriteria_id', 4)->first()->relSubKriteria->sub_kriteria_nilai;

            $value->profil_c1 = $profilStandar->where('kriteria_id', 1)->first()->relSubKriteria->sub_kriteria_nilai;
            $value->profil_c2 = $profilStandar->where('kriteria_id', 2)->first()->relSubKriteria->sub_kriteria_nilai;
            $value->profil_c3 = $profilStandar->where('kriteria_id', 3)->first()->relSubKriteria->sub_kriteria_nilai;
            $value->profil_c4 = $profilStandar->where('kriteria_id', 4)->first()->relSubKriteria->sub_kriteria_nilai;

            $value->hasil_profil_c1 = $c1;
            $value->hasil_profil_c2 = $c2;
            $value->hasil_profil_c3 = $c3;
            $value->hasil_profil_c4 = $c4;

            $value->hasil_gap_c1 = $gap->where('gap_selisih', $c1)->first()->gap_bobot;
            $value->hasil_gap_c2 = $gap->where('gap_selisih', $c2)->first()->gap_bobot;
            $value->hasil_gap_c3 = $gap->where('gap_selisih', $c3)->first()->gap_bobot;
            $value->hasil_gap_c4 = $gap->where('gap_selisih', $c4)->first()->gap_bobot;

            $core   = ($gap->where('gap_selisih', $c1)->first()->gap_bobot + $gap->where('gap_selisih', $c2)->first()->gap_bobot) / 2;
            $second = ($gap->where('gap_selisih', $c3)->first()->gap_bobot + $gap->where('gap_selisih', $c4)->first()->gap_bobot) / 2;

            $value->hasil_core   = $core;
            $value->hasil_second = $second;

            $value->total = ($core * 0.6) + ($second * 0.4);
        });
        return view('page.hasil.index', [
            'data' => Peritungan::all(),
            'dataProfil' => Profil_standar::all(),
            'dataPerhitungan' => $dataPerhitungan
        ]);
    }
}
