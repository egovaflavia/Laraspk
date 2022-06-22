<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@400;500&display=swap" rel="stylesheet">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="shortcut icon" href="{{ asset('public/logo.jpeg') }}" type="image/x-icon">
    <style>
        * {
            font-family: 'Quicksand', sans-serif;
        }

    </style>

    <title>{{ config('app.name', 'Aplikasi') }}</title>
</head>

<body>

    <div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom shadow-sm">
        <h5 class="my-0 mr-md-auto font-weight-normal">Sistem Pendukung Keputusan</h5>
        <nav class="my-2 my-md-0 mr-md-3">
            @guest
                <a class="p-2 text-dark" href="{{ route('login') }}">Login</a>
            @endguest
            @auth
                <a class="p-2 text-dark" href="{{ route('home.index') }}">Home</a>
                <a class="p-2 text-dark" href="{{ route('user.index') }}">User</a>
                <a class="p-2 text-dark" href="{{ route('supplier.index') }}">Supplier</a>
                <a class="p-2 text-dark" href="{{ route('kriteria.index') }}">Kriteira</a>
                <a class="p-2 text-dark" href="{{ route('sub_kriteria.index') }}">Sub Kriteria</a>
                <a class="p-2 text-dark" href="#">Profil Standar</a>
                <a class="p-2 text-dark" href="#">GAP</a>
                <a class="p-2 text-dark" href="#">Penilaian</a>
                <a class="p-2 text-dark" href="#">Perhitungan</a>
                <a class="p-2 text-dark" href="#">Hasil</a>
            @endauth
        </nav>
        @auth
            <a class="btn btn-outline-primary" href="{{ route('logout') }}">Logout</a>
        @endauth
    </div>

    @yield('content')

    <div class="container">
        <footer class="pt-4 my-md-5 pt-md-5 border-top">
            <div class="row">
                <div class="col-12 col-md">
                    <img class="mb-2" src="{{ asset('public/logo.jpeg') }}" alt="" width="60" height="24">
                    <small class="d-block mb-3 text-muted">&copy; SPK PM XGV</small>
                </div>
                <div class="col-6 col-md">
                    <h5>Menu</h5>
                    <ul class="list-unstyled text-small">
                        @auth
                            <li><a class="text-muted" href="{{ route('home.index') }}">Home</a></li>
                            <li><a class="text-muted" href="{{ route('user.index') }}">User</a></li>
                            <li><a class="text-muted" href="#">Supplier</a></li>
                        @endauth
                    </ul>
                </div>
                <div class="col-6 col-md">
                    <ul class="list-unstyled text-small">
                        @auth
                            <li><a class="text-muted" href="#">Kriteira</a></li>
                            <li><a class="text-muted" href="#">Sub Kriteria</a></li>
                            <li><a class="text-muted" href="#">Profil Standar</a></li>
                            <li><a class="text-muted" href="#">GAP</a></li>
                        @endauth
                    </ul>
                </div>
                <div class="col-6 col-md">
                    <ul class="list-unstyled text-small">
                        @guest
                            <li><a class="text-muted" href="{{ route('login') }}">Login</a></li>
                        @endguest
                        @auth
                            <li><a class="text-muted" href="#">Penilaian</a></li>
                            <li><a class="text-muted" href="#">Perhitungan</a></li>
                            <li><a class="text-muted" href="#">Hasil</a></li>
                            <li><a class="text-muted" href="{{ route('logout') }}">Logout</a></li>
                        @endauth
                    </ul>
                </div>
            </div>
        </footer>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
</body>

</html>
