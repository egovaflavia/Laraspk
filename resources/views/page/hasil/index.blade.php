@extends('layouts.app')
@section('content')
<style media="print">
    .no-print {
        display: none !important;
    }
    .print {
        display: block !important;
    }
    @media print
    {
    html, body { height: auto; }
    .dt-print-table, .dt-print-table thead, .dt-print-table th, .dt-print-table tr, .printable {border: 0 none !important;}
    }
</style>

{{-- <div class="pricing-header px-3 py-3 pt-md-3 pb-md-4 mx-auto text-center">
    <h1 class="display-6">Hasil</h1>
</div> --}}
<div class="row px-3 mt-5">
    <div class="col-md-4 d-flex justify-content-center">
        <img class="" width="200" src="{{ asset('public/logo.jpeg') }}" alt="">
    </div>
    <div class="col-md-8">
        <h2>Profile Matching</h2>
        <p>Implementasi Metode Profile Matching Untuk Mengetahui Supplier Terbaik
            Pada Toko Berkah Elektronilk & Furniture</p>
    </div>
</div>
<center class="my-4">
    <h2>Hasil</h2>
</center>

<div class="container">
    <div class="mb-4">
        <button class="no-print btn btn-primary btn-sm my-3" onclick="window.print()"><strong>Print</strong></button>
        <div class="table-responsive">
            <h4>Penilaian</h4>
            <table class="table table-bordered ">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Supplier</th>
                        <th>Quality</th>
                        <th>Cost</th>
                        <th>Delivery</th>
                        <th>Responsiveness</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($data as $no => $row)
                    <tr>
                        <td>{{ ++$no }}</td>
                        <td>{{ $row->relSupplier->supplier_nama }}</td>
                        <td>{{ $row->relC1->sub_kriteria_nama }}</td>
                        <td>{{ $row->relC2->sub_kriteria_nama }}</td>
                        <td>{{ $row->relC3->sub_kriteria_nama }}</td>
                        <td>{{ $row->relC4->sub_kriteria_nama }}</td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6">TIdak ada data</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>

        <h4 class="mt-3">Perengkingan</h4>
        <table class="table table-bordered ">
            <thead>
                <tr>
                    <th width="2" class="text-center">No</th>
                    <th class="text-center">Nama Supplier</th>
                    <th class="text-center">Total</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $no = 1;
                @endphp
                @forelse ($dataPerhitungan->SortByDesc('total') as $row)
                <tr>
                    <td>{{ $no++ }}</td>
                    <td>{{ $row->relSupplier->supplier_nama }}</td>
                    <td class="text-center">{{ $row->total }}</td>
                </tr>
                @empty
                <tr>
                    <td colspan="6">TIdak ada data</td>
                </tr>
                @endforelse
            </tbody>
        </table>
        </div>
        <div class="row mt-5">
            <div class="col-md-6"></div>
            <div class="col-md-6 d-flex justify-content-center">
                <p>
                    .............., {{ date('d-m-Y') }}
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <b>Pimpinan</b>
                </p>
            </div>
        </div>
    </div>
</div>
@endsection
