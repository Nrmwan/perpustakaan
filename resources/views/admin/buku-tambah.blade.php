@extends('layouts.admin')

@section('isidasboard')

<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

<div class="content">
    <div class="card card-info card-outlane">
        <div class="card-header">
            <h3>TAMBAH BUKU</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('simpan-buku') }}" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="judul" class="form-label">Judul</label>
                    <input type="text" id="judul" name="judul" class="form-control" placeholder="Judul Buku">
                </div>

                {{-- manggil tabel lain --}}

                {{-- <div class="form-group">
                    <select name="" id="" class="form-control select2" style="width: 100%;" name="nama_id_yang dipanggil" id="sama_name">
                        <option disabled value>Pilih data</option>
                        @foreach($nama_dicontroller as $nama )
                        <option value="{{ $nama-namaID }}">{{ $nama->nama_colom }}</option>
                        @endforeach
                    </select>
                </div> --}}

                {{-- akhir manggil --}}

                <div class="form-group">
                    <label for="penulis" class="form-label">Penulis</label>
                    <input type="text" id="penulis" name="penulis" class="form-control" required placeholder="Penulis Buku">
                </div>
                <div class="form-group">
                    <label for="penerbit" class="form-label">Penerbit</label>
                    <input type="text" id="penerbit" name="penerbit" class="form-control" required placeholder="Penerbit Buku">
                </div>
                <div class="form-group">
                    <label for="tahunTerbit" class="form-label">Tahun Terbit</label>
                    <input type="date" id="tahunTerbit" name="tahunTerbit" required class="form-control">
                </div>
                <div class="form-group">
                    <label for="stok" class="form-label">Stok Dimiliki</label>
                    <input type="number" id="stok" name="stok" required class="form-control">
                </div>
                <div class="form-group">
                    <label for="kategori" class="form-label">Kategori</label>
                    <select name="kategori[]" id="kategori" class="form-control select-multiple" required multiple>
                        <option value="">Pilih Kategori</option>
                        @foreach ($kategoris as $item)
                            <option value="{{ $item->kategoriID }}">{{ $item->namaKategori }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="image" class="form-label">Image</label>
                    <input type="file" name="image" class="form-control">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-success">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
    $(document).ready(function() {
        $('.select-multiple').select2();
    });
</script>

@endsection