@extends('layouts.admin')

@section('isidasboard')
<div class="content">
    <div class="card card-info card-outlane">
        <div class="card-header">
            <h3>EDIT KATEGORI BUKU</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('update-kategori', ['id' => $k->kategoriID]) }}" method="POST">
                {{ csrf_field() }}
                <div class="form-group">
                    <input type="text" id="namaKategori" name="namaKategori" class="form-control" value="{{ $k->namaKategori }}" placeholder="Kategori Buku">
                </div>
                {{-- manggil tabel lain --}}

                {{-- <div class="form-group">
                    <select name="" id="" class="form-control select2" style="width: 100%;" name="nama_id_yang dipanggil" id="sama_name">
                        <option disabled value>Pilih data</option>
                        <option value="{{ $nama->nama_colom }}">{{ $nama->nama_controller->nama_colom }}</option>
                        @foreach($nama_dicontroller as $nama )
                        <option value="{{ $nama-namaID }}">{{ $nama->nama_colom }}</option>
                        @endforeach
                    </select>
                </div> --}}

                {{-- akhir manggil --}}
                <div class="form-group">
                    <button type="submit" class="btn btn-success">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection