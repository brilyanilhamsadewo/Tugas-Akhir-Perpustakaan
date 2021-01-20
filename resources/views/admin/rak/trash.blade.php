@extends('admin.templates.default')

@section('content')
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Data Rak Terhapus</h3>
            {{-- <a href="{{ route('admin.author.create') }}" class="btn btn-danger">Delete All</a>
            <a href="{{ route('admin.author.trash') }}" class="btn btn-info">Restore All</a> --}}
            <a href="{{ route('admin.rak.index') }}" class="btn btn-secondary">Back</a>
        </div>
        
        <div class="box-body">

            <table id="" class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Rak</th>
                        <th>Lokasi Rak</th>
                    </tr>
                </thead>
                <tbody>
                    @php $no = 1; @endphp
                    @foreach ($raks as $rak)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ $rak->nama_rak }}</td>
                            <td>{{ $rak->lokasi_rak }}</td>
                            <td>
                                <a href="{{ route('admin.rak.restore', $rak)}}" class="btn btn-success">Restore</a>
                                <a href="{{ route('admin.rak.delete', $rak)}}" class="btn btn-danger">Delete Permanent</a>
                                
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection