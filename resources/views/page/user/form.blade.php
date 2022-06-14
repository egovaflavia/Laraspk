@extends('layouts.app')
@section('content')
<div class="pricing-header px-3 py-3 pt-md-3 pb-md-4 mx-auto text-center">
    <h1 class="display-6">Tambah Data User</h1>
</div>

<div class="container">
    <div class="mb-4">
        <a href="{{ route('user.index') }}" class="btn btn-sm btn-primary mb-3">Kembali</a>
        <div class="row">
            <div class="col-md-5 order-md-2 mb-4">
                <h4 class="d-flex justify-content-between align-items-center mb-3">
                    <span class="text-muted">Latest Data</span>
                </h4>
                <ul class="list-group mb-3">
                    @forelse ($data as $row)
                        <li class="list-group-item d-flex justify-content-between lh-condensed">
                            <div>
                                <h6 class="my-0">{{ $row->name }}</h6>
                                <small class="text-muted">{{ $row->username }}</small>
                            </div>
                            <span class="text-muted">{{ $row->level }}</span>
                        </li>
                    @empty
                        Tidak ada data
                    @endforelse

                </ul>

            </div>
            <div class="col-md-7 order-md-1">
                <h4 class="mb-3">Data User</h4>
                <form class="needs-validation"
                    action="{{ route('user.store', $row->id ?? null) }}"
                    method="POST"
                    >
                    @csrf
                    @if(isset($row))
                        @method('PATCH')
                    @endif
                    <div class="mb-3">
                        <label for="username">Username</label>
                        <div class="input-group">
                            <input type="text"
                                class="form-control"
                                id="username"
                                name="username"
                                placeholder="Username"
                                value="{{ old('username') ?? $row->username ?? '' }}"
                                required>
                            <div class="invalid-feedback" style="width: 100%;">
                                Your username is required.
                            </div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="email">Email <span class="text-muted">(Optional)</span></label>
                        <input type="email" class="form-control" id="email" placeholder="you@example.com">
                        <div class="invalid-feedback">
                            Please enter a valid email address for shipping updates.
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="address">Address</label>
                        <input type="text" class="form-control" id="address" placeholder="1234 Main St" required>
                        <div class="invalid-feedback">
                            Please enter your shipping address.
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="address2">Address 2 <span class="text-muted">(Optional)</span></label>
                        <input type="text" class="form-control" id="address2" placeholder="Apartment or suite">
                    </div>
                    <div class="mb-3">
                        <label for="address2">Level<span class="text-muted">(Optional)</span></label>
                        <select class="custom-select d-block w-100" id="country" required>
                            <option value="">Choose...</option>
                            <option>United States</option>
                          </select>
                    </div>
                    <hr class="mb-4">
                    <button class="btn btn-primary btn-lg btn-block" type="submit">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
