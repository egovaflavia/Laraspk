@extends('layouts.app')
@section('content')
<div class="pricing-header px-3 py-3 pt-md-3 pb-md-4 mx-auto text-center">
    <h1 class="display-6">Tambah Data Sub Kriteria</h1>
</div>

<div class="container">
    <div class="mb-4">
        <a href="{{ route('sub_kriteria.index') }}" class="btn btn-sm btn-primary mb-3">Kembali</a>
        <div class="row">
            <div class="col-md-5 order-md-2 mb-4">
                <h4 class="d-flex justify-content-between align-items-center mb-3">
                    <span class="text-muted">Data Kriteria</span>
                </h4>
                <ul class="list-group mb-3">
                    @forelse ($kriteria as $r)
                        <li class="list-group-item d-flex justify-content-between lh-condensed">
                            <div>
                                <h6 class="my-0">{{ $r->kriteria_nama }}</h6>
                                <small class="text-muted">{{ $r->kriteria_jenis }}</small>
                            </div>
                            <span class="text-muted">{{ $r->kriteria_bobot }}</span>
                        </li>
                    @empty
                        Tidak ada data
                    @endforelse

                </ul>

            </div>
            <div class="col-md-7 order-md-1">
                <h4 class="mb-3">Data Sub Kriteria</h4>
                <form class="needs-validation"
                    action="{{ route($route, $row->sub_kriteria_id ?? null) }}"
                    method="POST">
                    @csrf
                    @if(isset($row))
                        @method('PATCH')
                    @endif

                    <div class="mb-3">
                        <label for="kriteria_id">Kriteria</label>
                        @if($errors->has('kriteria_id'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            {{ $errors->first('kriteria_id') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        @endif
                        <div class="input-group">
                            <select name="kriteria_id"
                                    class="form-control"
                                    id="kriteria_id">
                                    <option value="">Pilih</option>
                                    @foreach ($kriteria as $rowK)
                                        <option value="{{ $rowK->kriteria_id }}">{{ $rowK->kriteria_nama }}</option>
                                    @endforeach
                            </select>
                            @if (isset($rowS))
                                <script>
                                    $('#kriteria_id').val('{{ $rowS->kriteria_id }}');
                                </script>
                            @endif
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="sub_kriteria_nama">Nama Sub Kriteria</label>
                        @if($errors->has('sub_kriteria_nama'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            {{ $errors->first('sub_kriteria_nama') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        @endif
                        <div class="input-group">
                            <input type="text"
                                class="form-control"
                                id="sub_kriteria_nama"
                                name="sub_kriteria_nama"
                                placeholder="Nama Sub Kriteria"
                                value="{{ old('sub_kriteria_nama') ?? $row->sub_kriteria_nama ?? '' }}">
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="sub_kriteria_nilai">Nilai</label>
                        @if($errors->has('sub_kriteria_nilai'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            {{ $errors->first('sub_kriteria_nilai') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        @endif
                        <div class="input-group">
                            <input type="text"
                                class="form-control"
                                id="sub_kriteria_nilai"
                                name="sub_kriteria_nilai"
                                placeholder="Nilai"
                                value="{{ old('sub_kriteria_nilai') ?? $row->sub_kriteria_nilai ?? '' }}"
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
