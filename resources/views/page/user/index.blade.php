@extends('layouts.app')
@section('content')
<div class="pricing-header px-3 py-3 pt-md-3 pb-md-4 mx-auto text-center">
    <h1 class="display-6">List Data User</h1>
</div>

<div class="container">
    <div class="mb-4">
        <a href="{{ route('user.create') }}" class="btn btn-sm btn-primary mb-3"><strong>Tambah</strong></a>
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
                            <a class="btn btn-sm btn-warning"
                                href="{{ route('user.edit', ['user' => $row]) }}">
                                    <strong>Edit</strong></a>

                            <form action="{{ route('user.destroy', ['user' => $row]) }}"
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
