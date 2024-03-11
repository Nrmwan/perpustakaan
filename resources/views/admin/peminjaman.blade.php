@extends('layouts.admin')

@section('isidasboard')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

<div class="content">
    <div class="card card-info card-outlane">
        <div class="col-12 col-md-8 offset-md-2 col-lg-6 offset-md-3">
            <h1>Tambah Data Peminjam</h1>

            <div class="mt-5">
                @if (session('message'))
                    <div class="alert {{ session('alert-class') }}">
                        {{ session('message') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
            </div>
            {{-- <div class="card-tols">
                <a href="{{ route('tambah-peminjaman') }}" class="bi bi-plus-square btn btn-success"> Tambah Peminjaman</a>
                <a href="{{ route('kembalikan') }}" class="bi bi-plus-square btn btn-success"> Pengembalian Buku</a>
            </div> --}}
        
            <form action="simpan-peminjaman" method="POST">
                @csrf
                <div class="md-3">
                    <label for="user" class="form-label">User</label>
                    <select name="userID" id="user" class="form-control inputbox">
                        <option value="">Pilih User</option>
                        @foreach ($user as $u)
                            <option value="{{ $u->id }}">{{ $u->userName }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="md-3">
                    <label for="buku" class="form-label">Buku</label>
                    <select name="bukuID" id="buku" class="form-control inputbox">
                        <option value="">Pilih Buku</option>
                        @foreach ($buku as $b)
                            <option value="{{ $b->bukuID }}">{{ $b->judul }}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <button type="submit" class="btn btn-primary w-100 mt-3">Simpan</button>
                </div>
                {{-- <a href="{{ route('kembalikan') }}" class="text-center"> Pengembalian Buku</a> --}}
                <p class="text-center">Mau <a href="{{ route('kembalikan') }}">Pengembalian Buku</a> ?</p>
            </form>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
    $(document).ready(function() {
    $('.inputbox').select2();
});
</script>
@endsection