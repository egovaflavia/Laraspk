@extends('layouts.app')
@section('content')
<div class="pricing-header px-3 py-3 pt-md-3 pb-md-4 mx-auto text-center">
    <h1 class="display-6">List Data Profil Standar</h1>
</div>

<div class="container">
    <div class="mb-4">
        <p><center>
            Profil Standar yang Dipilih (Dicari).
        </center></p>
        <div class="row d-flex justify-content-center">
            <div class="col-md-10 ">
                <div class="table-responsive">
                    <table class="table table-bordered ">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Kriteria</th>
                                <th>Sub Kriteria yg Dipilih</th>
                                <th>Nilai Profil Standar yg Dipilih</th>
                                <th>#</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($data as $no => $row)
                            <tr>
                                <td>{{ ++$no }}</td>
                                <td>{{ $row->relKriteria->kriteria_nama }}</td>
                                <td>{{ $row->relSubKriteria->sub_kriteria_nama }}</td>
                                <td>{{ $row->relSubKriteria->sub_kriteria_nilai }}</td>
                                <td>
                                    <a class="btn btn-sm btn-warning text-bold"
                                    href="{{ route('profil_standar.edit', ['profil_standar' => $row]) }}">
                                        <strong>Edit</strong>
                                    </a>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="6" ><center>Tidak ada data</center></td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
