@extends('welcome')
@section('title', 'SPP')
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
      <div class="col-lg-12 mb-4 order-0">
        <div class="card">
            <div class="card-header">
                <h5 class="float-start">SPP</h5>
                <a href="" data-bs-toggle="modal" data-bs-target="#tambahModal" class="btn btn-success float-end">Tambah SPP</a>
            </div>
            <div class="card-body">
                <div class="table-responsive text-nowrap">
                  <table class="table">
                    <thead class="table-light">
                      <tr>
                        <th>No</th>
                        <th>Tahun</th>
                        <th>Nominal</th>
                        <th>Aksi</th>
                      </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                      @foreach ($spp as $key => $item )
                        <tr>
                          <td>{{ $key +1 }}</td>
                          <td>{{ $item->tahun }}</td>
                          <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>Rp. {{ $item->nominal }}</strong></td>
                          <td>
                              <a class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#editModal{{ $item->id }}">Edit</a>
                              <a class="btn btn-danger btn-sm" href="{{ route('spp.delete', $item->id) }}">Hapus</a>
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
        <h5 class="modal-title" id="tambahModalLabel">Tambah SPP</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="{{ route('spp.tambah') }}" method="post">
          @csrf
          <div class="form-group my-1">
            <label for="tahun">Tahun :</label>
            <input type="text" class="form-control" id="tahun" name="tahun" value="" required placeholder="Masukan tahun">
          </div>

          <div class="form-group my-1">
            <label for="nominal">Nominal :</label>
            <input type="text" class="form-control" id="nominal" name="nominal"  required placeholder="Masukan nominal">
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



@foreach ($spp as $get)
<!-- Modal -->
<div class="modal fade" id="editModal{{ $get->id }}" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="editModalLabel">Edit SPP</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="{{ route('spp.update', $get->id) }}" method="post">
          @csrf
          <div class="form-group my-1">
            <label for="tahun">Tahun :</label>
            <input type="text" class="form-control" id="tahun" name="tahun" value="{{ $get->tahun }}" required placeholder="Masukan tahun">
          </div>

          <div class="form-group my-1">
            <label for="nominal">Nominal :</label>
            <input type="text" class="form-control" id="nominal" name="nominal" value="{{ $get->nominal }}" required placeholder="Masukan nominal">
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
