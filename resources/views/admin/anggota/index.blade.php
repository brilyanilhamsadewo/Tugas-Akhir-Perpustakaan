@extends('admin.templates.default')

@section('content')
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Data Anggota</h3>
            <a href="{{ route('admin.anggota.create') }}" class="btn btn-primary">Tambah Anggota</a>
            <a href="{{ route('admin.anggota.trash') }}" class="btn btn-primary">Tong Sampah</a>
        </div>
        
        <div class="box-body">

            <table id="dataTable" class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>Nomor</th>
                        <th>NIS/NIG</th>
                        <th>Nama</th>
                        <th>Tahun Masuk</th>
                        <th>No Telepon</th>
                        <th>Jenis Kelamin</th>
                        {{-- <th>Email Terverifikasi</th> --}}
                        {{-- <th>password</th> --}}
                        <th>Aksi</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>

    <form action="" method="POST" id="deleteForm">
        @csrf
        @method("DELETE")
        <input type="submit" value="Hapus" style="display: none">
    </form>
@endsection

@push('styles')
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
@endpush

@push('scripts')
    <!-- DataTables -->
    <script src="{{ asset('assets/bower_components/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/bs-notify.min.js') }}"></script>
    @include('admin.templates.partials.alerts')
    <script>
        $(function () {
            $('#dataTable').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{{ route('admin.anggota.data') }}',
                columns: [
                    { data: 'DT_RowIndex', orderable: false, searchable : false},
                    { data: 'nis_nig'},
                    { data: 'nama'},
                    { data: 'tahun_masuk'},
                    { data: 'no_telp'},
                    { data: 'jenis_kelamin'},
                    // { data: 'email_verified_at'},
                    // { data: 'password'},
                    { data: 'action'}
                ]
            });
        });
    </script>
@endpush