@extends('admin.templates.default')

@section('content')
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Manajemen Role</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item active">Role</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
​
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-4">
                    @card
                        @slot('title')
                        Tambah
                        @endslot
                        
                        @if (session('error'))
                            @alert(['type' => 'danger'])
                                {!! session('error') !!}
                            @endalert
                        @endif
​
                        <form role="form" action="{{ route('admin.role.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="name">Role</label>
                                <input type="text" 
                                name="name"
                                class="form-control {{ $errors->has('name') ? 'is-invalid':'' }}" id="name" required>
                            </div>
                        @slot('footer')
                            <div class="card-footer">
                                <button class="btn btn-primary">Simpan</button>
                            </div>
                        </form>
                        @endslot
                    @endcard
                </div>
                <div class="col-md-8">
                    @card
                        @slot('title')
                        List Role
                        @endslot
                        
                        @if (session('success'))
                            @alert(['type' => 'success'])
                                {!! session('success') !!}
                            @endalert
                        @endif
                        
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <td>#</td>
                                        <td>Role</td>
                                        <td>Guard</td>
                                        <td>Created At</td>
                                        <td>Aksi</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $no = 1; @endphp
                                    @forelse ($roles as $row)
                                    <tr>
                                        <td>{{ $no++ }}</td>
                                        <td>{{ $row->name }}</td>
                                        <td>{{ $row->guard_name }}</td>
                                        <td>{{ $row->created_at }}</td>
                                        <td>
                                            <form action="{{ route('admin.role.destroy', $row->id) }}" method="POST">
                                                @csrf
                                                <input type="hidden" name="_method" value="DELETE">
                                                <button class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="5" class="text-center">Tidak ada data</td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
​
                        {{-- <div class="float-right">
                            {!! $roles->links() !!}
                        </div> --}}
                        @slot('footer')
​
                        @endslot
                    @endcard
                </div>
            </div>
        </div>
    </section>
</div>
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
                ajax: '{{ route('admin.rak.data') }}',
                columns: [
                    { data: 'DT_RowIndex', orderable: false, searchable : false},
                    { data: 'nama_rak'},
                    { data: 'lokasi_rak'},
                    { data: 'action'}
                ]
            });
        });
    </script>
@endpush