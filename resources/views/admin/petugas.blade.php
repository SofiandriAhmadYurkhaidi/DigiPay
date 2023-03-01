@extends('welcome')
@section('title', 'Petugas')
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row mb-3">
        <div class="card">
				<form action="{{ route('petugas.tambah') }}" method="post">
                     @csrf
					<div class="card-header">
						<h4 class="card-title">Tambah Petugas</h4>
                    </div>
					<div class="card-body border-top my-2">
						<div class="row mt-2">
							<div class="col-xs-12 col-sm-3">
								<div class="form-group">
									<label for="name">Nama : </label>
									<input type="text" name="name" id="name" class="form-control" placeholder="Masukan nama">
								</div>
							</div>
                            <div class="col-xs-12 col-sm-3">
								<div class="form-group">
									<label for="email">Email : </label>
									<input type="text" name="email" id="email" class="form-control" placeholder="Masukan Email">
								</div>
							</div>
							<div class="col-xs-12 col-sm-3">
								<div class="form-group">
									<label for="password">Password : </label>
									<input type="password" name="password" id="password" class="form-control" placeholder="Masukan Password">
								</div>
							</div>
                            <div class="col-xs-12 col-sm-3">
                                <div class="form-group">
									<label for="no_telp">No. Telepon : </label>
									<input type="number" name="no_telp" id="no_telp" class="form-control" placeholder="Masukan No. Telp">
								</div>
							</div>
                            <div class="col-xs-12 col-sm-8 mt-1">
                                <div class="form-group">
									<label for="alamat">Alamat : </label>
									<input type="text" name="alamat" id="alamat" class="form-control" placeholder="Masukan Alamat">
								</div>
							</div>
							<div class="col-xs-12 col-sm-3 mt-2">
                                <br>
                                <button type="submit" class="btn btn-success"><i class="fa fa-plus"></i> Tambah </button>
							</div>
					    </div>
				    </div>
			    </form>
	      </div>
     </div>

    <div class="row">
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
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                  @foreach ($petugas as $key => $user )
                    <tr>
                      <td>{{ $key +1 }}</td>
                      <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>{{ $user->name }}</strong></td>
                      <td>{{ $user->email }}</td>
                      <td>{{ $user->petugas->no_telp }}</td>
                      <td>{{ $user->petugas->alamat  }}</td>
                      <td>
                          <a class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#editModal{{ $user->id }}" data-toggle="modal" data-target="#editSppModal">Edit</a>
                          <a class="btn btn-danger btn-sm" href="{{ route('petugas.delete', $user->id) }}">Hapus</a>
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

<!-- Button trigger modal -->


<!-- Modal -->
@foreach ($petugas as $item)
<div class="modal fade" id="editModal{{ $item->id }}"  aria-labelledby="editModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editModalLabel">Edit item</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="{{ route('petugas.update', $item->id) }}" method="post">
          @csrf


          <div class="form-group">
            <label for="name">Nama : </label>
            <input type="text" name="name" id="name" class="form-control" value="{{ $item->petugas->name }}" placeholder="Masukan nama">
          </div>

          <div class="form-group">
            <label for="email">Email : </label>
            <input type="text" name="email" id="email" class="form-control" value="{{ $item->email }}" placeholder="Masukan Email">
          </div>

          <div class="form-group">
            <label for="password">Password : </label>
            <input type="password" name="password" id="password" class="form-control" value="*********" placeholder="Masukan Password">
            <span class="text-danger">Tidak perlu diisi jika tidak ingin diganti!</span>
          </div>

          <div class="form-group my-1">
            <label for="no_telp">No. Telepon :</label>
            <input type="number" class="form-control" id="no_telp" value="{{ $item->petugas->no_telp }}" name="no_telp" required placeholder="Masukan Nomor Telepon">
          </div>

          <div class="form-group my-1">
            <label for="alamat">Alamat :</label>
            <textarea class="form-control" name="alamat" id="alamat" cols="30" rows="7">
                {{ $item->petugas->alamat }}
            </textarea>
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
@endforeach



@endsection
