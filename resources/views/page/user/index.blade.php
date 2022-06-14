@extends('layouts.app')
@section('content')
<div class="pricing-header px-3 py-3 pt-md-3 pb-md-4 mx-auto text-center">
    <h1 class="display-6">List Data User</h1>
</div>

<div class="container">
    <div class="mb-4">
        <a href="{{ route('user.create') }}" class="btn btn-sm btn-primary mb-3">Tambah</a>
        <div class="table-responsive">
            <table class="table table-bordered ">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Username</th>
                        <th>Level</th>
                        <th>#</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($data as $no => $row)
                    <tr>
                        <td>{{ ++$no }}</td>
                        <td>{{ $row->name }}</td>
                        <td>{{ $row->email }}</td>
                        <td>{{ $row->username }}</td>
                        <td>{{ $row->level }}</td>
                        <td>
                            <a href="{{ route('user.edit', ['user' => $row->id]) }}"
                                class="btn btn-sm btn-warning">Edit</a>
                            <a class="btn btn-sm btn-danger">Hapus</a>
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
