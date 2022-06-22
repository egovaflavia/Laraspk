<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('page.supplier.index', [
            'data' => Supplier::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('page.supplier.form', [
            'data' => Supplier::latest('supplier_id', 'DESC')->take(3)->get(),
            'route' => 'supplier.store'
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
            'supplier_nama'   => 'required',
            'supplier_alamat' => 'required',
            'supplier_email'  => 'required',
            'supplier_notlp'  => 'required',
        ], [
            'required' => ':attribute harus di isi'
        ]);

        if ($validator->fails()) {
            return redirect()
                ->route('supplier.create')
                ->with('message', 'Data gagal di simpan')
                ->withErrors($validator)
                ->withInput();
        }

        Supplier::create($request->all());

        return redirect()
            ->route('supplier.index')
            ->with('message', 'Data berhasil di simpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function show(Supplier $supplier)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function edit(Supplier $supplier)
    {
        return view('page.supplier.form',[
            'row' => $supplier,
            'data' => Supplier::latest('supplier_id', 'DESC')->take(3)->get(),
            'route' => 'supplier.update'
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Supplier $supplier)
    {
        $supplier->update($request->all());

        return redirect()
            ->route('supplier.index')
            ->with('message', 'Data berhasil di update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function destroy(Supplier $supplier)
    {
        $supplier->delete();
        return redirect()
            ->route('supplier.index')
            ->with('message', 'Data berhasil di hapus');
    }
}
