@extends('layouts.admin')

@section('isidasboard')
<div class="content">
    <div class="card card-info card-outlane">
        <div class="card-header">
            <h3>TAMBAH KATEGORI</h3>
        </div>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="card-body">
            <form action="{{ route('simpan-kategori') }}" method="POST">
                @csrf
                <div class="form-group">
                    <input type="text" id="namaKategori" name="namaKategori" class="form-control @error('namaKategori') is-invalid @enderror" required placeholder="kategori Buku">
                </div>
                @error('namaKategori')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
                <div class="form-group">
                    <button type="submit" class="btn btn-success">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection