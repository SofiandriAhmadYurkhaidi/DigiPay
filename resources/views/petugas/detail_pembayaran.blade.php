@extends('welcome')
@section('title', 'Pembayaran')
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
      <div class="col-lg-12 mb-4 order-0">
        <div class="card">
            <div class="card-header">
                <h5 class="float-start">SPP {{ $siswa->name }}</h5>
                <a href="" data-bs-toggle="modal" data-bs-target="#tambahModal" class="btn btn-success float-end">Tambah Pembayaran SPP</a>
            </div>
            <div class="card-body">
                <div class="table-responsive text-nowrap">
                  <table id="tablePembayaran" class="table">
                    <thead class="table-light">
                      <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>NISN</th>
                        <th>NIS</th>
                        <th>Kelas</th>
                        <th>Tahun Bayar</th>
                        <th>Bulan Bayar</th>
                        <th>Tanggal Bayar</th>
                        <th>Jumlah Bayar</th>
                        <th>Aksi</th>
                      </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                      @foreach ($pembayaran as $key => $item )
                        <tr>
                          <td>{{ $key +1 }}</td>
                          <td>{{ $item->siswa->name }}</td>
                          <td>{{ $item->siswa->nisn }}</td>
                          <td>{{ $item->siswa->nis }}</td>
                          <td>{{ $item->siswa->kelas->kelas }}</td>
                          <td>{{ $item->tahun_bayar  }}</td>
                          <td>{{ $item->bulan_bayar }}</td>
                          <td>{{ $item->tanggal_bayar }}</td>
                          <td>{{ $item->jumlah_bayar }}</td>
                          <td>
                              <a href="{{ route('pembayaran.petugas.delete', $item->id) }}"><i class="text-danger bx bx-trash me-1"></i> </a>
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


    <!-- Button trigger modal -->
    <div class="modal fade" id="tambahModal"  aria-labelledby="tambahModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="tambahModalLabel">Pembayaran SPP</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form action="{{ route('pembayaran.petugas.tambah', $siswa->id) }}" method="post">
            @csrf
            <div class="form-group my-1">
                <label for="tahun">Tahun Bayar :</label>
                <select class="form-select" name="tahun_bayar">
                    <option selected>-- Pilih Tahun --</option>
                    @foreach ($spp as $get )
                        <option value="{{ $get->tahun }}">{{ $get->tahun }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group my-1">
                <label for="bulan">Bulan Bayar :</label>
                <select class="form-select" name="bulan_bayar">
                    <option selected>-- Pilih Bulan --</option>
                    <option value="Januari">Januari</option>
                    <option value="Februari">Februari</option>
                    <option value="Maret">Maret</option>
                    <option value="April">April</option>
                    <option value="Mei">Mei</option>
                    <option value="Juni">Juni</option>
                    <option value="Juli">Juli</option>
                    <option value="Agustus">Agustus</option>
                    <option value="September">September</option>
                    <option value="Oktober">Oktober</option>
                    <option value="November">November</option>
                    <option value="Desember">Desember</option>
                </select>
            </div>

            <div class="form-group my-1">
                <label for="tanggal_bayar">Tanggal Bayar :</label>
                <input type="date" class="form-control" id="tanggal_bayar" name="tanggal_bayar"  required placeholder="Masukan Tanggal bayar">
            </div>

            <div class="form-group my-1">
                <label for="jumlah_bayar">Jumlah Bayar :</label>
                <select class="form-select" name="jumlah_bayar">
                    <option selected>-- Pilih Jumlah --</option>
                    @foreach ($spp as $get )
                        <option value="{{ $get->nominal }}">{{ $get->nominal }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save changes</button>
        </div>
            </form>
        </div>
    </div>
</div>



@endsection
