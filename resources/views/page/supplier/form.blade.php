@extends('layouts.app')
@section('content')
<div class="pricing-header px-3 py-3 pt-md-3 pb-md-4 mx-auto text-center">
    <h1 class="display-6">Tambah Data Supplier</h1>
</div>

<div class="container">
    <div class="mb-4">
        <a href="{{ route('supplier.index') }}" class="btn btn-sm btn-primary mb-3"><strong>Kembali</strong></a>
        <div class="row">
            <div class="col-md-5 order-md-2 mb-4">
                <h4 class="d-flex justify-content-between align-items-center mb-3">
                    <span class="text-muted">Latest Data</span>
                </h4>
                <ul class="list-group mb-3">
                    @forelse ($data as $r)
                        <li class="list-group-item d-flex justify-content-between lh-condensed">
                            <div>
                                <h6 class="my-0">{{ $r->supplier_nama }}</h6>
                                <small class="text-muted">{{ $r->supplier_notlp }}</small>
                            </div>
                            <span class="text-muted">{{ $r->supplier_email }}</span>
                        </li>
                    @empty
                        Tidak ada data
                    @endforelse

                </ul>

            </div>
            <div class="col-md-7 order-md-1">
                <h4 class="mb-3">Data Supplier</h4>
                <form class="needs-validation"
                    action="{{ route($route, $row->supplier_id ?? null) }}"
                    method="POST">
                    @csrf
                    @if(isset($row))
                        @method('PATCH')
                    @endif

                    <div class="mb-3">
                        <label for="supplier_nama">Nama Supplier</label>
                        @if($errors->has('supplier_nama'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            {{ $errors->first('supplier_nama') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        @endif
                        <div class="input-group">
                            <input type="text"
                                class="form-control"
                                id="supplier_nama"
                                name="supplier_nama"
                                placeholder="Nama Supplier"
                                value="{{ old('supplier_nama') ?? $row->supplier_nama ?? '' }}">
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="supplier_email">Email Supplier </label>
                        @if($errors->has('supplier_email'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            {{ $errors->first('supplier_email') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        @endif
                        <input type="text"
                            class="form-control"
                            id="supplier_email"
                            name="supplier_email"
                            placeholder="you@example.com"
                            value="{{ old('supplier_email') ?? $row->supplier_email ?? '' }}">
                    </div>

                    <div class="mb-3">
                        <label for="supplier_notlp">No Telp</label>
                        @if($errors->has('supplier_notlp'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            {{ $errors->first('supplier_notlp') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        @endif
                        <div class="input-group">
                            <input type="text"
                                class="form-control"
                                id="supplier_notlp"
                                name="supplier_notlp"
                                placeholder="No Tlp"
                                value="{{ old('supplier_notlp') ?? $row->supplier_notlp ?? '' }}">
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="alamat">Alamat</label>
                        @if($errors->has('supplier_alamat'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            {{ $errors->first('supplier_alamat') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        @endif
                        <div class="input-group">
                            <textarea   name="supplier_alamat"
                                        id="supplier_alamat"
                                        class="form-control"
                                        rows="3">{{ old('supplier_alamat') ?? $row->supplier_alamat ?? '' }}
                            </textarea>
                        </div>
                    </div>

                    <hr class="mb-4">
                    <button class="btn btn-primary btn-lg btn-block" type="submit">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
