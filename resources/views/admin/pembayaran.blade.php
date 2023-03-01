@extends('welcome')
@section('title', 'Pembayaran')
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
      <div class="col-lg-12 mb-4 order-0">
        <div class="card">
            <div class="card-header">
                <h5 class="float-start">SPP</h5>
            </div>
            <div class="card-body">
                <div class="table-responsive text-nowrap">
                  <table class="table">
                    <thead class="table-light">
                      <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>NISN</th>
                        <th>NIS</th>
                        <th>Kelas</th>
                        <th>Aksi</th>
                      </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                      @foreach ($siswa as $key => $item )
                        <tr>
                          <td>{{ $key +1 }}</td>
                          <td>{{ $item->name }}</td>
                          <td>{{ $item->siswa->nisn }}</td>
                          <td>{{ $item->siswa->nis }}</td>
                          <td>{{ $item->siswa->kelas->kelas }}</td>
                          <td>
                              <a class="btn btn-primary btn-sm" href="{{ route('pembayaran.detail', $item->siswa->id) }}">Bayar</a>
                          </td>
                        </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
            </div>
          </div>
      </div>
    </div>
</div>


@endsection
