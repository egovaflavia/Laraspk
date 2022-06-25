@extends('layouts.app')
@section('content')
<div class="pricing-header px-3 py-3 pt-md-3 pb-md-4 mx-auto text-center">
    <h1 class="display-6">Tambah Data Penilaian</h1>
</div>

<div class="container">
    <div class="mb-4">
        <a href="{{ route('penilaian.index') }}" class="btn btn-sm btn-primary mb-3"><strong>Kembali</strong></a>
        <div class="row">
            <div class="col-md-5 order-md-2 mb-4">
                <h4 class="d-flex justify-content-between align-items-center mb-3">
                    <span class="text-muted">Kriteria</span>
                </h4>
                <ul class="list-group mb-3">
                    @forelse ($dataKriteria as $r)
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
                <h4 class="mb-3">Data Penilaian</h4>
                <form class="needs-validation"
                    action="{{ route($route, $row->perhitungan_id ?? null) }}"
                    method="POST">
                    @csrf
                    @if(isset($row))
                        @method('PATCH')
                    @endif

                    @if (isset($row))
                    <div class="form-group">
                        <label for="name">Supplier</label>
                        <input type="text" class="form-control" value="{{ $row->relSupplier->supplier_nama }}" disabled>
                    </div>
                    @else
                        @if (isset($suppliers))
                            @if($errors->has('supplier_id'))
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                {{ $errors->first('supplier_id') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            @endif
                            <div class="mb-3">
                                <label for="name">Supplier</label>
                                <select name="supplier_id"
                                    class="form-control @error('supplier_id') {{ 'is-invalid' }} @enderror"
                                    id="supplier_id">
                                    <option value="">Pilih</option>
                                    @foreach($suppliers as $dataSupplier)
                                        <option value="{{ $dataSupplier->supplier_id }}">{{ $dataSupplier->supplier_nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                        @endif
                    @endif

                    <div class="mb-3">
                        <label for="perhitungan_c1">Quality</label>
                        @if($errors->has('perhitungan_c1'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            {{ $errors->first('perhitungan_c1') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        @endif
                        <div class="input-group">
                            <select class="form-control"
                                name="perhitungan_c1"
                                id="perhitungan_c1" required>
                                <option value="">Pilih</option>
                                @foreach ($perhitungan_c1 as $rc1)
                                    <option value="{{ $rc1->sub_kriteria_id }}"
                                        @if (isset($row))
                                        {{ $row->perhitungan_c1 == $rc1->sub_kriteria_id ? 'selected' : '' }}
                                        @endif>
                                        {{ $rc1->sub_kriteria_nama }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="perhitungan_c2">Cost</label>
                        @if($errors->has('perhitungan_c2'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            {{ $errors->first('perhitungan_c2') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        @endif
                        <div class="input-group">
                            <select class="form-control"
                                name="perhitungan_c2"
                                id="perhitungan_c2" required>
                                <option value="">Pilih</option>
                                @foreach ($perhitungan_c2 as $rc2)
                                <option value="{{ $rc2->sub_kriteria_id }}"
                                    @if(isset($row))
                                    {{ $row->perhitungan_c2 == $rc2->sub_kriteria_id ? 'selected' : '' }}
                                    @endif>
                                    {{ $rc2->sub_kriteria_nama }}
                                </option>
                                @endforeach
                            </select>

                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="perhitungan_c3">Delivery</label>
                        @if($errors->has('perhitungan_c3'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            {{ $errors->first('perhitungan_c3') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        @endif
                        <div class="input-group">
                            <select class="form-control"
                                name="perhitungan_c3"
                                id="perhitungan_c3" required>
                                <option value="">Pilih</option>
                                @foreach ($perhitungan_c3 as $rc3)
                                <option value="{{ $rc3->sub_kriteria_id }}"
                                    @if(isset($row))
                                    {{ $row->perhitungan_c3 == $rc3->sub_kriteria_id ? 'selected' : '' }}
                                    @endif>
                                    {{ $rc3->sub_kriteria_nama }}
                                </option>
                                @endforeach
                            </select>

                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="perhitungan_c4">Responsiveness</label>
                        @if($errors->has('perhitungan_c4'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            {{ $errors->first('perhitungan_c4') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        @endif
                        <div class="input-group">
                            <select class="form-control"
                                name="perhitungan_c4"
                                id="perhitungan_c4" required>
                                <option value="">Pilih</option>
                                @foreach ($perhitungan_c4 as $rc4)
                                <option value="{{ $rc4->sub_kriteria_id }}"
                                    @if(isset($row))
                                    {{ $row->perhitungan_c4 == $rc4->sub_kriteria_id ? 'selected' : '' }}
                                    @endif>
                                    {{ $rc4->sub_kriteria_nama }}
                                </option>
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
