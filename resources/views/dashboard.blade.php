@extends('welcome')

@section('title', 'Dashboard')
@section('content')

<div class="container-fluid py-4">
    <div class="row">
      <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
        <div class="card">
          <div class="card-body p-3">
            <div class="row">
              <div class="col-8">
                <div class="numbers">
                  <p class="text-sm mb-0 text-uppercase font-weight-bold">Kelas</p>
                  <h5 class="font-weight-bolder">
                    {{$kelas}}
                  </h5>
                </div>
              </div>
              <div class="col-4 text-end">
                <div class="icon icon-shape bg-gradient-primary shadow-primary text-center rounded-circle">
                  <i class="ni ni-building text-lg opacity-10" aria-hidden="true"></i>
                </div>
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
                  <p class="text-sm mb-0 text-uppercase font-weight-bold">SPP</p>
                  <h5 class="font-weight-bolder">
                    {{$spp}}
                  </h5>
                </div>
              </div>
              <div class="col-4 text-end">
                <div class="icon icon-shape bg-gradient-danger shadow-danger text-center rounded-circle">
                  <i class="ni ni-credit-card text-lg opacity-10" aria-hidden="true"></i>
                </div>
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
                  <p class="text-sm mb-0 text-uppercase font-weight-bold">Siswa</p>
                  <h5 class="font-weight-bolder">
                    {{$siswa}}
                  </h5>
                </div>
              </div>
              <div class="col-4 text-end">
                <div class="icon icon-shape bg-gradient-success shadow-success text-center rounded-circle">
                  <i class="ni ni-circle-08 text-lg opacity-10" aria-hidden="true"></i>
                </div>
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
                  <p class="text-sm mb-0 text-uppercase font-weight-bold">Petugas</p>
                  <h5 class="font-weight-bolder">
                    {{$petugas}}
                  </h5>
                </div>
              </div>
              <div class="col-4 text-end">
                <div class="icon icon-shape bg-gradient-warning shadow-warning text-center rounded-circle">
                  <i class="ni ni-single-02 text-lg opacity-10" aria-hidden="true"></i>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="row mt-5">
        <div class="col-lg-12 mb-4 order-0">
          <div class="card">
              <h5 class="card-header">Petugas</h5>
              <div class="table-responsive text-nowrap">
                <table class="table">
                  <thead class="table-light">
                    <tr>
                      <th>No</th>
                      <th>Nama</th>
                      <th>Email</th>
                      <th>No. Telepon</th>
                      <th>Alamat</th>
                    </tr>
                  </thead>
                  <tbody class="table-border-bottom-0">
                    @foreach ($data_petugas as $key => $user )
                      <tr>
                        <td>{{ $key +1 }}</td>
                        <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>{{ $user->name }}</strong></td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->petugas->no_telp }}</td>
                        <td>{{ $user->petugas->alamat  }}</td>
                      </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
        </div>


@endsection
