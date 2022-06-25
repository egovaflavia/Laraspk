@extends('layouts.app')
@section('content')
<div class="pricing-header px-3 py-3 pt-md-3 pb-md-4 mx-auto text-center">
    <h1 class="display-6">List Data Penilaian</h1>
</div>

<div class="container">
    <div class="mb-4">
        <a href="{{ route('penilaian.create') }}" class="btn btn-sm btn-primary mb-3"><strong>Tambah</strong></a>
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
                        <th>Nama Supplier</th>
                        <th>Quality</th>
                        <th>Cost</th>
                        <th>Delivery</th>
                        <th>Responsiveness</th>
                        <th>#</th>
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
                        <td>
                            <a class="btn btn-sm btn-warning"
                                href="{{ route('penilaian.edit', ['penilaian' => $row]) }}">
                                    <strong>Edit</strong></a>

                            <form action="{{ route('penilaian.destroy', ['penilaian' => $row->perhitungan_id]) }}"
                                style="display:inline-block"
                                name="formDelete"
                                method="post">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger"
                                    type="submit">
                                    <strong>Hapus</strong>
                                </button>
                            </form>
                        </td>
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
</div>
@endsection
