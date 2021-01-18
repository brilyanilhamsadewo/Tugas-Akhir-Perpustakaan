@extends('admin.templates.default')

@section('content')
<div class="box">
    <div class="box-header">
        <h3 class="box-title">History Pengembalian Buku</h3>
        {{-- <a href="{{ route('admin.pinjam.create')}}" class="btn btn-primary">Tambah Peminjaman</a> --}}
        {{-- <a href="{{ url('/admin/pengembalianv2/history') }}" class="">History Pengembalian</a> --}}
    </div>

    <div class="box-body">

        <table id="dataTable" class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Peminjam</th>
                    <th>NIS / NIP</th>
                    <th>Judul Buku</th>
                    <th>ISSN</th>
                    {{-- <th>Nama Petugas</th> --}}
                    <th>Tanggal Pinjam</th>
                    <th>Tanggal Kembali</th>
                    {{-- <th>Aksi</th> --}}
                </tr>
            </thead>

            <tbody>
                @php $no = 1; @endphp
                @foreach($peminjaman as $p)
	
                <tr>
                    <td>{{$no++}}</td>
                    <td>{{$p->member->nama_member}}</td>
                    <td>{{$p->member->nis_nip}}</td>
                    <td>{{$p->book->title}}</td>
                    <td>{{$p->book->issn}}</td>
                    {{-- <td>{{$p->user->name}}</td> --}}
                    <td>{{\Carbon\Carbon::parse($p->tanggal_pinjam)->format('d/m/Y')}}</td>
                    <td>{{\Carbon\Carbon::parse($p->tanggal_kembali)->format('d/m/Y')}}</td>
                    <td>
                    <!-- fontawesome  -->
                    {{-- <a class="btn btn-primary" href="{{ url('/admin/pengembalianv2/kembalikan/'.$p->id) }}">KEMBALIKAN</a> --}}
                    </td>
                    
                </tr>
                @endforeach
            </tbody>
        </table>
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