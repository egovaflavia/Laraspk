@extends('layouts.app')
@section('content')
<div class="pricing-header px-3 py-3 pt-md-3 pb-md-4 mx-auto text-center">
    <h1 class="display-6">List Data Kriteria</h1>
</div>

<div class="container">
    <div class="mb-4">
        {{-- <a href="{{ route('kriteria.create') }}" class="btn btn-sm btn-primary mb-3">Tambah</a> --}}
        @if (session('message'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session()->get('message') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        <div class="table-responsive">
            <table class="table table-bordered ">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Kriteria</th>
                        <th>Jenis Kriteria</th>
                        <th>Bobot</th>
                        <th>#</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($data as $no => $row)
                    <tr>
                        <td>{{ ++$no }}</td>
                        <td>{{ $row->kriteria_nama }}</td>
                        <td>{{ $row->kriteria_jenis }}</td>
                        <td>{{ $row->kriteria_bobot }}</td>
                        <td>
                            <a class="btn btn-sm btn-warning"
                                href="{{ route('kriteria.edit', ['kriterium' => $row]) }}">
                                    <strong>Edit</strong></a>

                            {{-- <form action="{{ route('kriteria.destroy', ['kriterium' => $row->kriteria_id]) }}"
                                style="display:inline-block"
                                name="formDelete"
                                method="post">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger"
                                    type="submit">
                                    <strong>Hapus</strong>
                                </button>
                            </form> --}}
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
@endsection
