@extends('admin.templates.default')

@section('content')
<div class="box">
    <div class="box-header">
        <h3 class="box-title">Lpaoran Buku Terlaris</h3>
        <a href="{{ route('admin.report.laporan-top-book') }}" class="btn btn-primary">Cetak</a>
        <!-- Button trigger modal -->
        {{-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
            Launch demo modal
        </button> --}}
  
    </div>

    <div class="box-body">

        <table id="dataTable" class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>Nomor</th>
                    <th>Judul</th>
                    <th>Deskripsi</th>
                    <th>Jumlah Buku</th>
                    <th>Total Dipinjam</th>
                    <th>Penulis</th>
                    <th>Sampul</th>
                </tr>
            </thead>

            <tbody>
                @php
                    $page = 1;
                    if (request()->has('page')) {
                        $page = request('page');
                    }
                    $no = (10 * $page) - (10-1); //1
                @endphp
                @foreach ($books as $book)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $book->title }}</td>
                        <td>{{ $book->description }}</td>
                        <td>{{ $book->qty }}</td>
                        <td>{{ $book->borrowed_count }}</td>
                        <td>{{ $book->author->name }}</td>
                        <td>
                            <img src="{{ $book->getCover() }}" height="150px" alt="{{ $book->title }}">
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $books->links() }}
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form>
        <div class="modal-body">
          {{-- Test --}}
          
            <div class="form-group">
              <label for="tanggal_awal">Tanggal Awal</label>
              <input type="date" class="form-control" id="tanggal_awal" placeholder="Masukkan tanggal">
            </div>
            <div class="form-group">
              <label for="tanggal_akhir">Tanggal Akhir</label>
              <input type="date" class="form-control" id="tanggal_akhir" placeholder="Masukkan tanggal">
            </div>
          
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <a href="" onclick="this.href='/admin/report/laporan-top-book-pertanggal/'+document.getElementById('tanggal_awal').value + '/' + document.getElementById('tanggal_akhir').value" class="btn btn-primary">Cetak</a>
        </div>
        </form>
      </div>
    </div>
  </div>

@endsection