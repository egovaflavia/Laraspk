@extends('layouts.app')
@section('content')
<div class="pricing-header px-3 py-3 pt-md-3 pb-md-4 mx-auto text-center">
    <h1 class="display-6">List Data Supplier</h1>
</div>

<div class="container">
    <div class="mb-4">
        <a href="{{ route('sub_kriteria.create') }}" class="btn btn-sm btn-primary mb-3">Tambah</a>
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
                        <th>Nama Sub Kriteria</th>
                        <th>Kriteria</th>
                        <th>Nilai</th>
                        <th>#</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($data as $no => $row)
                    <tr>
                        <td>{{ ++$no }}</td>
                        <td>{{ $row->relKriteria->kriteria_nama }}</td>
                        <td>{{ $row->sub_kriteria_nama }}</td>
                        <td>{{ $row->sub_kriteria_nilai }}</td>
                        <td>
                            <a class="btn btn-sm btn-warning"
                                href="{{ route('sub_kriteria.edit', ['sub_kriterium' => $row]) }}">
                                    Edit</a>

                            <form action="{{ route('sub_kriteria.destroy', ['sub_kriterium' => $row]) }}"
                                style="display:inline-block"
                                name="formDelete"
                                method="post">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger"
                                    type="submit">
                                    Hapus
                                </button>
                            </form>
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
