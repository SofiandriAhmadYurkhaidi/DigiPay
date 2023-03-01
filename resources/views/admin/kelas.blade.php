@extends('welcome')
@section('title', 'Kelas')
@section('content')

<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
      <div class="col-lg-12 mb-4 order-0">
        <div class="card">
            <div class="card-header">
                <h5 class="float-start">Kelas</h5>
                <a href="" data-bs-toggle="modal" data-bs-target="#tambahModal" class="btn btn-success float-end">Tambah Kelas</a>
            </div>
            <div class="card-body">
                <div class="table-responsive text-nowrap">
                  <table class="table">
                    <thead class="table-light">
                      <tr>
                        <th>No</th>
                        <th>Kelas</th>
                        <th>Aksi</th>
                      </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                      @foreach ($kelas as $key => $kelas )
                        <tr>
                          <td>{{ $key +1 }}</td>
                          <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>{{ $kelas->kelas }}</strong></td>
                          <td>
                              <a class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#editModal{{ $kelas->id }}" data-toggle="modal" data-target="#editModal">Edit</a>
                              <a class="btn btn-danger btn-sm" href="{{ route('kelas.delete', $kelas->id) }}">Hapus</a>
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
        <h5 class="modal-title" id="tambahModalLabel">Tambah Kelas</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="{{ route('kelas.tambah') }}" method="post">
        @csrf
        <div class="form-group my-1">
            <label for="kelas">Kelas :</label>
            <input type="text" class="form-control" id="kelas" name="kelas" required placeholder="Masukan Kelas">
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


<!-- Modal -->

@foreach ($jurusan as $jurusan)
<div class="modal fade" id="editModal{{ $jurusan->id }}"  aria-labelledby="editModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editModalLabel">Edit Kelas</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="{{ route('kelas.update', $jurusan->id) }}" method="post">
        @csrf
        <div class="form-group my-1">
            <label for="kelas">Kelas :</label>
            <input type="text" class="form-control" id="kelas" name="kelas" value="{{ $jurusan->kelas }}" required placeholder="Masukan Kelas">
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save changes</button>
        </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endforeach

@endsection
