@extends('layouts.admin')

@section('isidasboard')
<div class="container-fluid py-4">
    <div class="row">
      <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
        <div class="card">
          <div class="card-body p-3">
            <div class="row">

              <div class="col-8">
                <div class="numbers">
                  <p class="text-sm mb-0 text-uppercase font-weight-bold">Total User</p>
                  <h5 class="font-weight-bolder">{{ $user }}</h5>
                </div>
              </div>

              <div class="col-4 text-end">
                <i class="bi bi-person-circle text-lg opacity-10" aria-hidden="true"></i>
              </div>

            </div>
          </div>
        </div>
      </div>
      <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
        <div class="card">
          <div class="card-body p-3">
            <div class="row">

              <div class="col-8">
                <div class="numbers">
                  <p class="text-sm mb-0 text-uppercase font-weight-bold">Total Buku</p>
                  <h5 class="font-weight-bolder">{{ $buku }}</h5>
                </div>
              </div>

              <div class="col-4 text-end">
                <i class="bi bi-book"></i>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="col-xl-3 col-sm-6">
        <div class="card">
          <div class="card-body p-3">
            <div class="row">
              <div class="col-8">
                <div class="numbers">
                  <p class="text-sm mb-0 text-uppercase font-weight-bold">Total Peminjaman</p>
                  <h5 class="font-weight-bolder">{{ $peminjaman }}</h5>
                </div>
              </div>
              <div class="col-4 text-end">
                  <i class="bi bi-clipboard"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
      
    <div class="row mt-4">
      <div class="col-lg-12 mb-lg-0 mb-4">
        <div class="card ">
              <div class="card-header pb-0 p-3">
                <div class="d-flex justify-content-between">
                  <h6 class="mb-2">Data Status Peminjaman</h6>
                </div>
              </div>
          <div class="table-responsive">

            <table class="table align-items-center">
              <thead>
                <tr>
                  <th>No</th>
                  <th>User</th>
                  <th>Judul Buku</th>
                  <th>Tanggal Meminjam</th>
                  <th>Tanggal Pengembalian</th>
                  <th>Status</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td colspan="6" style="text-align: center">no data</th>
                </tr>
              </tbody>
            </table>
          </div>

        </div>
      </div>
    </div>
    <footer class="footer pt-3  ">
      <div class="container-fluid">
        <div class="row align-items-center justify-content-lg-between">
          <div class="col-lg-6 mb-lg-0 mb-4">
            <div class="copyright text-center text-sm text-muted text-lg-start">
              © <script>
                document.write(new Date().getFullYear())
              </script>,
              made with <i class="fa fa-heart"></i> by
              <a href="https://www.creative-tim.com" class="font-weight-bold" target="_blank">Perpus Digital</a>
              for a better web.
            </div>
          </div>
          {{-- <div class="col-lg-6">
            <ul class="nav nav-footer justify-content-center justify-content-lg-end">
              <li class="nav-item">
                <a href="https://www.creative-tim.com" class="nav-link text-muted" target="_blank">Creative Tim</a>
              </li>
              <li class="nav-item">
                <a href="https://www.creative-tim.com/presentation" class="nav-link text-muted" target="_blank">About Us</a>
              </li>
              <li class="nav-item">
                <a href="https://www.creative-tim.com/blog" class="nav-link text-muted" target="_blank">Blog</a>
              </li>
              <li class="nav-item">
                <a href="https://www.creative-tim.com/license" class="nav-link pe-0 text-muted" target="_blank">License</a>
              </li>
            </ul>
          </div> --}}
        </div>
      </div>
    </footer>
  </div>
@endsection