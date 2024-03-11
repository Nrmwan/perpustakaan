@extends('layouts.admin')

@section('isidasboard')
<div class="content">
    <div class="card card-info card-outlane">
        <div class="card-header">
            <h3>Edit Data</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('update-user', $user->id) }}" method="POST">
                {{ csrf_field() }}
                <div class="form-group">
                    <input type="text" id="userName" name="userName" class="form-control" value="{{ $user->userName }}" required placeholder="User Name">
                </div>
                <div class="form-group">
                    <input type="text" id="namaLengkap" name="namaLengkap" class="form-control" value="{{ $user->namaLengkap }}" required placeholder="Nama Lengkap">
                </div>
                <div class="form-group">
                    <input type="number" id="no_tlp" name="no_tlp" class="form-control" value="{{ $user->no_tlp }}" required placeholder="Nomor Telepon">
                </div>
                <div class="form-group">
                    <input type="text" id="alamat" name="alamat" class="form-control" value="{{ $user->alamat }}" required placeholder="Alamat">
                </div>
                <div class="form-group">
                    <input type="email" id="email" name="email" class="form-control" value="{{ $user->email }}" required placeholder="Email">
                </div>
                <div class="form-group">
                    <input type="password" id="password" name="password" class="form-control" value="{{ $user->password }}" required placeholder="Password">
                </div>
                <div class="form-group">
                    <input type="number" id="type" name="type" class="form-control" value="{{ $user->type }}" required placeholder="Role">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-success">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection