@extends('layouts.admin')

@section('isidasboard')
<div class="content">
    <div class="card card-info card-outlane">
        <div class="card-body mt-3">
            <x-peminjaman :peminjaman='$p'/>
        </div>
    </div>
</div>
@endsection