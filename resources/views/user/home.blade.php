<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>PERPUSTAKAAN</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="#">
                    PERPUSTAKAAN
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    {{-- <ul class="navbar-nav me-auto"> --}}
                        <ul class="navbar-nav me-auto ps-5">
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('pinjam') }}">{{ __('Daftar Pinjam') }}</a>
                            </li>
                        </ul>
                    {{-- </ul> --}}

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">

                        <form action="" method="GET">
                            <div class="row pe-5 pt-2">
                                <div class="col-12 col-sm-6">
                                    <select name="kategori" id="kategori" class="form-control">
                                        <option value="">Pilih Kategori</option>
                                        @foreach ($kategori as $k)
                                            <option value="{{ $k->kategoriID }}">{{ $k->namaKategori }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <div class="input-group mb-3">
                                        <input type="text" name="judul" class="form-control" placeholder="Cari judul buku">
                                        <button class="btn btn-primary" type="submit">Cari</button>
                                      </div>
                                </div>
                            </div>
                        </form>
                        <!-- Authentication Links -->
                            <li class="nav-item dropdown">
                                
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->userName }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            <div class="px-5 my-5">
                <div class="row">
                    @foreach ($buku as $item)
                    <div class="col-lg-3 col-md-4 col-sm-6 mb-3">
                        <div class="card h-100">
                            <img src="{{ $item->cover != null ? asset('storage/cover/'.$item->cover) : asset('images/perpus.jpg') }}" class="card-img-top" width="10px" draggable="false">
                            <div class="card-body">
                              <h5 class="card-title">{{ $item->judul }}</h5>
                              <p class="card-text">{{ $item->penulis }}</p>
                              <a href="#" class="btn btn-primary">Go somewhere</a>
                            </div>
                          </div>
                    </div>
                    @endforeach
                    
                </div>
            </div>
        </main>
    </div>
</body>
</html>
