@extends('layouts.app')
@section('content')
<div class="pricing-header px-3 py-3 pt-md-3 pb-md-4 mx-auto text-center">
    <h1 class="display-6">Perhitungan</h1>
</div>

<div class="container">
    <div class="mb-4">
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

            <h4>Normalisasi</h4>
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
                        <td>{{ $row->perhitungan_c1 }}</td>
                        <td>{{ $row->perhitungan_c2 }}</td>
                        <td>{{ $row->perhitungan_c3 }}</td>
                        <td>{{ $row->perhitungan_c4 }}</td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6">TIdak ada data</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>

            <h4>Nilai Profil Standar</h4>
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
                        <td>{{ $row->perhitungan_c1 }}</td>
                        <td>{{ $row->perhitungan_c2 }}</td>
                        <td>{{ $row->perhitungan_c3 }}</td>
                        <td>{{ $row->perhitungan_c4 }}</td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6">TIdak ada data</td>
                    </tr>
                    @endforelse
                </tbody>
                <tfoot>

                    <tr>
                        <th colspan="2" class="bg-primary">
                            Nilai Profil Standar</th>
                        @foreach ($dataProfil as $rProfil)
                            <th class="bg-primary">{{ $rProfil->relSubKriteria->sub_kriteria_nilai  }}</th>
                        @endforeach
                    </tr>
                </tfoot>
            </table>

            <h4>Gap Penilaian dan Profil Standar</h4>
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
                    @forelse ($dataPerhitungan as $no => $row)
                    <tr>
                        <td>{{ ++$no }}</td>
                        <td>{{ $row->relSupplier->supplier_nama }}</td>
                        <td>{{ $row->hasil_profil_c1 }}</td>
                        <td>{{ $row->hasil_profil_c2 }}</td>
                        <td>{{ $row->hasil_profil_c3 }}</td>
                        <td>{{ $row->hasil_profil_c4 }}</td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6">TIdak ada data</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>

            <h4>Nilai Gap</h4>
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
                    @forelse ($dataPerhitungan as $no => $row)
                    <tr>
                        <td>{{ ++$no }}</td>
                        <td>{{ $row->relSupplier->supplier_nama }}</td>
                        <td>{{ $row->hasil_gap_c1 }}</td>
                        <td>{{ $row->hasil_gap_c2 }}</td>
                        <td>{{ $row->hasil_gap_c3 }}</td>
                        <td>{{ $row->hasil_gap_c4 }}</td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6">TIdak ada data</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>

            <h4>Nilai Rata-Rata</h4>
            <table class="table table-bordered ">
                <thead>
                    <tr>
                        <th rowspan="2" class="text-center">No</th>
                        <th rowspan="2" class="text-center">Nama Supplier</th>
                        <th colspan="2" class="text-center">Core Factor</th>
                        <th colspan="2" class="text-center">Secondary Factor</th>
                    </tr>
                    <tr>
                        <th class="text-center">Quality</th>
                        <th class="text-center">Cost</th>
                        <th class="text-center">Delivery</th>
                        <th class="text-center">Responsiveness</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($dataPerhitungan as $no => $row)
                    <tr>
                        <td>{{ ++$no }}</td>
                        <td>{{ $row->relSupplier->supplier_nama }}</td>
                        <td colspan="2" class="text-center">{{ $row->hasil_core }}</td>
                        <td colspan="2" class="text-center">{{ $row->hasil_second }}</td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6">TIdak ada data</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <h4>Total Nilai</h4>
        <table class="table table-bordered ">
            <thead>
                <tr>
                    <th width="2" class="text-center">No</th>
                    <th class="text-center">Nama Supplier</th>
                    <th class="text-center">Total</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($dataPerhitungan as $no => $row)
                <tr>
                    <td>{{ ++$no }}</td>
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

        <h4>Perengkingan</h4>
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
</div>
@endsection
