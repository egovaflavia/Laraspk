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
                    @forelse ($data as $r)
                        <li class="list-group-item d-flex justify-content-between lh-condensed">
                            <div>
                                <h6 class="my-0">{{ $r->name }}</h6>
                                <small class="text-muted">{{ $r->username }}</small>
                            </div>
                            <span class="text-muted">{{ $r->level }}</span>
                        </li>
                    @empty
                        Tidak ada data
                    @endforelse

                </ul>

            </div>
            <div class="col-md-7 order-md-1">
                <h4 class="mb-3">Data User</h4>
                <form class="needs-validation"
                    action="{{ route($route, $row->id ?? null) }}"
                    method="POST">
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
                                value="{{ old('username') ?? $row->username ?? '' }}">
                                @error('username')
                                    <div class="invalid-feedback" style="width: 100%;">
                                        {{ $message }}
                                    </div>
                                @enderror
                                @if($errors->has('username'))
                                    <div class="error">{{ $errors->first('username') }}</div>
                                @endif
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="email">Email </label>
                        <input type="email"
                            class="form-control"
                            id="email"
                            name="email"
                            placeholder="you@example.com"
                            value="{{ old('email') ?? $row->email ?? '' }}"
                            required>
                        <div class="invalid-feedback">
                            Please enter a valid email address for shipping updates.
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="name">Name</label>
                        <div class="input-group">
                            <input type="text"
                                class="form-control"
                                id="name"
                                name="name"
                                placeholder="Name"
                                value="{{ old('name') ?? $row->name ?? '' }}"
                                required>
                            <div class="invalid-feedback" style="width: 100%;">
                                Your username is required.
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="password">Password</label>
                        <div class="input-group">
                            <input type="password"
                                class="form-control"
                                id="password"
                                name="password"
                                placeholder="Password"
                                value="{{ old('password') ?? '' ?? '' }}">
                            <div class="invalid-feedback" style="width: 100%;">
                                Your username is required.
                            </div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="address2">Level<span class="text-muted">(Optional)</span></label>
                        <select name="level" class="custom-select d-block w-100" id="country" required>
                            <option value="admin">Admin</option>
                            <option value="pimpinan">Pimpinan</option>
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
