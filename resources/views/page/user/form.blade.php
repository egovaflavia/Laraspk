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
                        @if($errors->has('username'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            {{ $errors->first('username') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        @endif
                        <div class="input-group">
                            <input type="text"
                                class="form-control"
                                id="username"
                                name="username"
                                placeholder="Username"
                                value="{{ old('username') ?? $row->username ?? '' }}">
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="email">Email </label>
                        @if($errors->has('email'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            {{ $errors->first('email') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        @endif
                        <input type="email"
                            class="form-control"
                            id="email"
                            name="email"
                            placeholder="you@example.com"
                            value="{{ old('email') ?? $row->email ?? '' }}">
                    </div>
                    <div class="mb-3">
                        <label for="name">Nama</label>
                        @if($errors->has('name'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            {{ $errors->first('name') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        @endif
                        <div class="input-group">
                            <input type="text"
                                class="form-control"
                                id="name"
                                name="name"
                                placeholder="Name"
                                value="{{ old('name') ?? $row->name ?? '' }}">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="password">Password</label>
                        @if($errors->has('password'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            {{ $errors->first('password') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        @endif
                        <div class="input-group">
                            <input type="password"
                                class="form-control"
                                id="password"
                                name="password"
                                placeholder="Password"
                                value="{{ old('password') ?? '' ?? '' }}">
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="level">Level</label>
                        @if($errors->has('level'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            {{ $errors->first('level') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        @endif
                        <select name="level" class="custom-select d-block w-100" id="country">
                            <option value="">Pilih</option>
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
