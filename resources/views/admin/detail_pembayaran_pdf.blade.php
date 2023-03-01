<!DOCTYPE html>
 <html lang="en">
 <head>
    <title>Pembayaran PDF</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
 </head>
 <body>
    <style type="text/css">
		table tr td,
		table tr th{
			font-size: 9pt;
		}
	</style>
    <div class="card-header">
        <h4 class="text-center">Laporan Pembayaran Siswa</h4>
    </div>
    <div class="card-body">
        {{-- <div class="table-responsive text-nowrap"> --}}
          <table class="table table-bordered table-hover">
            <thead class="table-light">
              <tr>
                <th>No</th>
                <th>Nama</th>
                <th>NISN</th>
                <th>NIS</th>
                <th>Kelas</th>
                <th>Petugas</th>
                <th>Tahun Bayar</th>
                <th>Bulan Bayar</th>
                <th>Jumlah Bayar</th>
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
                  <td>{{ $item->petugas->name }}</td>
                  <td>{{ $item->tahun_bayar  }}</td>
                  <td>{{ $item->bulan_bayar }}</td>
                  <td>{{ $item->jumlah_bayar }}</td>
                </tr>
              @endforeach
            </tbody>
          </table>
        {{-- </div> --}}
    </div>
  </div>
 </body>
 </html>
