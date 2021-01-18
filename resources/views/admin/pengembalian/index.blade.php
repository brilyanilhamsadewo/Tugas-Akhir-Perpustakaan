@extends('admin.templates.default')

@section('content')
<div class="box">
    <div class="box-header">
        <h3 class="box-title">Data Pengembalian Buku</h3>
        {{-- <a href="{{ route('admin.pinjam.create')}}" class="btn btn-primary">Tambah Peminjaman</a> --}}
        <a href="#" class="">History Pengembalian</a>
    </div>

    <div class="box-body">

        <table id="dataTable" class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Peminjam</th>
                    <th>Judul Buku</th>
                    <th>Nama Petugas</th>
                    <th>Tanggal Pinjam</th>
                    <th>Tanggal Kembali</th>
                    <th>Aksi</th>
                </tr>
            </thead>

            <tbody>
                @php $no = 1; @endphp
                @foreach($peminjaman as $p)
                <tr>
                    <td>{{ $no++ }}</td>
                    <td>{{$p->user->name}}</td>
                    <td>{{$p->book->title}}</td>
                    <td>{{$p->user->name}}</td>
                    <td>{{\Carbon\Carbon::parse($p->tanggal_pinjam)->format('d/m/Y')}}</td>
                    <td>{{\Carbon\Carbon::parse($p->tanggal_kembali)->format('d/m/Y')}}</td>
                    <td>
                    <!-- fontawesome  -->
                        {{-- <!-- <a href="{{url('/peminjaman/peminjaman/edit/'.$p->id)}}" class="badge badge-success"><i class="fas fa-edit"></i> Edit Peminjaman</a> --> --}}
                        <a href="{{url('admin/pengembalian/simpan_pengembalian/'.$p->id)}}" class="badge badge-success">Kembalikan</a>
                        {{-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                            Launch demo modal
                        </button> --}}
                        <a class="btn btn-primary" href="{{ url('/admin/pengembalian/kembalikan/'.$p->id) }}">KEMBALIKAN</a>
                        {{-- <!-- <a href="{{url('/peminjaman/hapusSementara/'.$p->id)}}" onclick="return confirm('Are you sure?')" class="badge badge-danger"><i class="fas fa-times"></i> Hapus Sementara</a> --> --}}
                    </td>
                    
                </tr>

                {{-- @php
                $tanggal_kembali = $p->tanggal_kembali;
                $tanggal_sekarang = 
                @endphp --}}
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Pengembalian Buku</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <div class="form-group @error('name') has-error @enderror">
                <label for="">ID PEMINJAMAN</label>
                <span><input type="text" name="name" class="form-control" placeholder="Masukkan nama penulis" value=""></span>
                @error('name')
                    <span class="help-block">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group @error('name') has-error @enderror">
                <label for="">Judul Buku</label>
                <span><input type="text" name="name" class="form-control" placeholder="Masukkan nama penulis" value=""></span>
                @error('name')
                    <span class="help-block">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group @error('name') has-error @enderror">
                <label for="">Tanggal Pinjam</label>
                <span><input type="text" name="name" class="form-control" placeholder="Masukkan nama penulis" value=""></span>
                @error('name')
                    <span class="help-block">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group @error('name') has-error @enderror">
                <label for="">Tanggal Harus Kembali</label>
                <span><input type="text" name="name" class="form-control" placeholder="Masukkan nama penulis" value=""></span>
                @error('name')
                    <span class="help-block">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group @error('name') has-error @enderror">
                <label for="">Tanggal Pengembalian Aktual</label>
                <span><input type="text" name="name" class="form-control" placeholder="Masukkan nama penulis" value=""></span>
                @error('name')
                    <span class="help-block">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group @error('name') has-error @enderror">
                <label for="">Denda</label>
                <span><input type="text" name="name" class="form-control" placeholder="Masukkan nama penulis" value=""></span>
                @error('name')
                    <span class="help-block">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </div>
  </div>

<form action="" method="post" id="returnForm">
    @csrf
    @method("PUT")
    <input type="submit" value="Return" style="display: none">
</form>
@endsection

@push('styles')
<link rel="stylesheet" href="{{ asset('assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
@endpush

@push('scripts')
    <script src="{{ asset('assets/bower_components/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/bs-notify.min.js') }}"></script>
    @include('admin.templates.partials.alerts')
    <script>
        $(function () {
            $('#dataTable').DataTable({
                // processing: true,
                // serverSide: true,
                // ajax: '{{ route('admin.kembali.data') }}',
                // columns: [
                //     { data: 'DT_RowIndex', orderable: false, searchable : false},
                //     { data: 'user'},
                //     { data: 'book_title'},
                //     { data: 'nama_admin'},
                //     { data: 'tanggal_pinjam'},
                //     { data: 'tanggal_kembali'},
                //     { data: 'action'},
                //     // { data: '#'}
                // ]
            });
        });
    </script>
@endpush