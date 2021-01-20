@extends('admin.templates.default')

@section('content')
<div class="box">
    <div class="box-header">
        <h3 class="box-title">Laporan Peminjaman Buku</h3>
        <a href="{{ route('admin.report.laporan-peminjaman-buku') }}" class="btn btn-primary">Cetak</a>
        {{-- <a href="{{ route('admin.report.laporan-top-book') }}" class="btn btn-primary">Cetak</a> --}}
        <!-- Button trigger modal -->
        {{-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
            Launch demo modal
        </button> --}}
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
            Cetak per tanggal
        </button>
  
    </div>

    <div class="box-body">

        <table id="dataTable" class="table table-bordered table-hover">
        <thead>
            <tr>
                <th>Id Peminjaman</th>
                <th>Nama Peminjam</th>
                <th>NIS / NIP</th>
                <th>Judul Buku</th>
                <th>ISSN</th>
                {{-- <th>Nama Petugas</th> --}}
                <th>Tanggal Pinjam</th>
                {{-- <th>Tanggal Kembali</th> --}}
            </tr>
        </thead>

            <tbody>
                {{-- @php
                    $page = 1;
                    if (request()->has('page')) {
                        $page = request('page');
                    }
                    $no = (10 * $page) - (10-1); //1
                @endphp --}}
                @foreach($peminjaman as $p)
	
                <tr>
                    <td>{{$p->id}}</td>
                    <td>{{$p->member->nama_member}}</td>
                    <td>{{$p->member->nis_nip}}</td>
                    <td>{{$p->book->title}}</td>
                    <td>{{$p->book->issn}}</td>
                    {{-- <td>{{$p->user->name}}</td> --}}
                    <td>{{\Carbon\Carbon::parse($p->tanggal_pinjam)->format('d/m/Y')}}</td>
                    {{-- <td>{{\Carbon\Carbon::parse($p->tanggal_kembali)->format('d/m/Y')}}</td> --}}
                    {{-- <td>
                    <!-- fontawesome  -->
                        <!-- <a href="{{url('/peminjaman/peminjaman/edit/'.$p->ID_PEMINJAMAN)}}" class="badge badge-success"><i class="fas fa-edit"></i> Edit Peminjaman</a> -->
                        <a href="{{url('/peminjaman/peminjaman/simpan_pengembalian/'.$p->ID_PEMINJAMAN)}}" class="badge badge-success"><i class="fas fa-edit"></i> Kembalikan</a>
                        <!-- <a href="{{url('/peminjaman/hapusSementara/'.$p->ID_PEMINJAMAN)}}" onclick="return confirm('Are you sure?')" class="badge badge-danger"><i class="fas fa-times"></i> Hapus Sementara</a> -->
                    </td> --}}
                    
                </tr>
                @endforeach
            </tbody>
        </table>
        {{-- {{ $books->links() }} --}}
    </div>
</div>



<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Cetak Laporan</h5>
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
          <a href="" onclick="this.href='/admin/report/laporan-peminjaman-buku-pertanggal/'+document.getElementById('tanggal_awal').value + '/' + document.getElementById('tanggal_akhir').value" class="btn btn-primary">Cetak</a>
        </div>
        </form>
      </div>
    </div>
  </div>

@endsection