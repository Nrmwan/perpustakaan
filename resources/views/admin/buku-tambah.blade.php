@extends('layouts.admin')

@section('isidasboard')
<div class="content">
    <div class="card card-info card-outlane">
        <div class="card-header">
            <h3>TAMBAH BUKU</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('simpan') }}" method="POST">
                {{ csrf_field() }}
                <div class="form-group">
                    <input type="text" id="judul" name="judul" class="form-control" placeholder="Judul Buku">
                </div>
                <div class="form-group">
                    <input type="text" id="penulis" name="penulis" class="form-control" placeholder="Penulis Buku">
                </div>
                <div class="form-group">
                    <input type="text" id="penerbit" name="penerbit" class="form-control" placeholder="Penerbit Buku">
                </div>
                <div class="form-group">
                    <input type="date" id="tahunTerbit" name="tahunTerbit" class="form-control">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-success">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection