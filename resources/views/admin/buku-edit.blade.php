@extends('layouts.admin')

@section('isidasboard')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

<div class="content">
    <div class="card card-info card-outlane">
        <div class="card-header">
            <h3>Edit BUKU</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('update-buku', ['id' => $buku->bukuID]) }}" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="judul" class="form-label">Judul</label>
                    <input type="text" id="judul" name="judul" class="form-control" value="{{ $buku->judul }}" placeholder="Judul Buku">
                </div>
                
                <div class="form-group">
                    <label for="penulis" class="form-label">Penulis</label>
                    <input type="text" id="penulis" name="penulis" class="form-control" value="{{ $buku->penulis }}" required placeholder="Penulis Buku">
                </div>
                <div class="form-group">
                    <label for="penerbit" class="form-label">Penerbit</label>
                    <input type="text" id="penerbit" name="penerbit" class="form-control" value="{{ $buku->penerbit }}" required placeholder="Penerbit Buku">
                </div>
                <div class="form-group">
                    <label for="tahunTerbit" class="form-label">Tahun Terbit</label>
                    <input type="date" id="tahunTerbit" name="tahunTerbit" value="{{ $buku->tahunTerbit }}" required class="form-control">
                </div>
                <div class="form-group">
                    <label for="kategori" class="form-label">Kategori</label>
                    <select name="kategori[]" id="kategori" class="form-control select-multiple" multiple>
                        <option value="">Pilih Kategori</option>
                        @foreach ($kategoris as $item)
                            <option value="{{ $item->kategoriID }}">{{ $item->namaKategori }}</option>
                        @endforeach
                    </select>
                    <label for="kategoriBuku">Kategori Buku Sebelumnya :</label>
                    <ul>@foreach ($buku->kategories as $category)
                        <li>{{ $category->namaKategori }}</li>
                    @endforeach</ul>
                </div>
                <div class="form-group">
                    <label for="stok" class="form-label">Stok</label>
                    <input type="number" id="stok" name="stok" value="{{ $buku->stok }}" required class="form-control">
                </div>
                <div class="form-group">
                    <label for="image" class="form-label">Image</label>
                    <input type="file" name="image" class="form-control">
                    <label for="imageS" style="display:block">Image Sebelumnya :</label>
                    @if ($buku->cover!='')
                        <img src="{{ asset('storage/cover/'.$buku->cover) }}" alt="" width="250px">
                    @else
                        <img src="{{ asset('images/perpus.jpg') }}" alt="" width="250px">
                    @endif
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