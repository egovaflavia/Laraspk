@extends('layouts.app')
@section('content')
<div class="pricing-header px-3 py-3 pt-md-3 pb-md-4 mx-auto text-center">
    <h1 class="display-6">List Data Gap</h1>
</div>

<div class="container">
    <div class="mb-4">
        <p><center>
            GAP adalah perbedaan / selisih value masing-masing aspek / attribut dengan value target.
        </center></p>
        <div class="row d-flex justify-content-center">
            <div class="col-md-10 ">
                <div class="table-responsive">
                    <table class="table table-bordered ">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Selisih</th>
                                <th>Bobot Nilai</th>
                                <th>Keterangan</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($data as $no => $row)
                            <tr>
                                <td>{{ ++$no }}</td>
                                <td>{{ $row->gap_selisih }}</td>
                                <td>{{ $row->gap_bobot }}</td>
                                <td>{{ $row->gap_ket }}</td>
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
