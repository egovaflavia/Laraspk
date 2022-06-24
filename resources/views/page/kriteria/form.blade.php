@extends('layouts.app')
@section('content')
<div class="pricing-header px-3 py-3 pt-md-3 pb-md-4 mx-auto text-center">
    <h1 class="display-6">Tambah Data Kriteria</h1>
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
                                <h6 class="my-0">{{ $r->kriteria_nama }}</h6>
                                <small class="text-muted">{{ $r->kriteria_bobot }}</small>
                            </div>
                            <span class="text-muted">{{ $r->kriteria_jenis }}</span>
                        </li>
                    @empty
                        Tidak ada data
                    @endforelse

                </ul>

            </div>
            <div class="col-md-7 order-md-1">
                <h4 class="mb-3">Data Kriteria</h4>
                <form class="needs-validation"
                    action="{{ route($route, $row->kriteria_id ?? null) }}"
                    method="POST">
                    @csrf
                    @if(isset($row))
                        @method('PATCH')
                    @endif

                    <div class="mb-3">
                        <label for="kriteria_nama">Nama Kriteria</label>
                        @if($errors->has('kriteria_nama'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            {{ $errors->first('kriteria_nama') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        @endif
                        <div class="input-group">
                            <input type="text"
                                class="form-control"
                                id="kriteria_nama"
                                name="kriteria_nama"
                                placeholder="Nama Kriteria"
                                value="{{ old('kriteria_nama') ?? $row->kriteria_nama ?? '' }}">
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="kriteria_jenis">Jenis</label>
                        @if($errors->has('kriteria_jenis'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            {{ $errors->first('kriteria_jenis') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        @endif
                        <div class="input-group">
                            <select class="form-control"
                                name="kriteria_jenis"
                                id="kriteria_jenis">
                                <option value="">Pilih</option>
                                <option value="Core Factor">Core Factor</option>
                                <option value="Secondary Factor">Secondary Factor</option>
                            </select>
                            <script>
                                if (isset($row)) {
                                    $('#kriteria_jenis').val('{{ $row->supplier_alamat ?? '' }}');
                                }
                            </script>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="kriteria_bobot">Bobot</label>
                        @if($errors->has('kriteria_bobot'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            {{ $errors->first('kriteria_bobot') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        @endif
                        <div class="input-group">
                            <input type="text"
                                class="form-control"
                                id="kriteria_bobot"
                                name="kriteria_bobot"
                                placeholder="Bobot"
                                value="{{ old('kriteria_bobot') ?? $row->kriteria_bobot ?? '' }}"
                                required>
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
