@extends('layouts.app')
@section('content')
<div class="pricing-header px-3 py-3 pt-md-3 pb-md-4 mx-auto text-center">
    <h1 class="display-6">Edit Data Profil Standar</h1>
</div>

<div class="container">
    <div class="mb-4">
        <a href="{{ route('profil_standar.index') }}" class="btn btn-sm btn-primary mb-3"><strong>Kembali</strong></a>
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
                <h4 class="mb-3">Data Profil Standar</h4>
                <form class="needs-validation"
                    action="{{ route($route, $row->profil_standar_id ?? null) }}"
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
                            <input type="text"
                                value="{{ $row->relKriteria->kriteria_nama }}"
                                class="form-control"
                                readonly>
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
                            <select type="text"
                                class="form-control"
                                id="sub_kriteria_id"
                                name="sub_kriteria_id" required>
                                <option value="">Pilih</option>
                                @foreach ($sub_kriteria as $rs )
                                    <option value="{{ $rs->sub_kriteria_id }}">{{ $rs->sub_kriteria_nama }}</option>
                                @endforeach
                            </select>
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
