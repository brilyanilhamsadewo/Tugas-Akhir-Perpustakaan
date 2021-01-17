@extends('admin.templates.default')

@section('content')
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Data Anggota Terhapus</h3>
            {{-- <a href="{{ route('admin.author.create') }}" class="btn btn-danger">Delete All</a>
            <a href="{{ route('admin.author.trash') }}" class="btn btn-info">Restore All</a> --}}
            <a href="{{ route('admin.anggota.index') }}" class="btn btn-secondary">Back</a>
        </div>
        
        <div class="box-body">

            <table id="" class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>Nomor</th>
                        <th>NIS/NIG</th>
                        <th>Nama</th>
                        <th>Tahun Masuk</th>
                        <th>Jenis Kelamin</th>
                        <th>No Telepon</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @php $no = 1; @endphp
                    @foreach ($anggotas as $anggota)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ $anggota->nis_nig }}</td>
                            <td>{{ $anggota->nama }}</td>
                            <td>{{ $anggota->tahun_masuk }}</td>
                            <td>{{ $anggota->jenis_kelamin }}</td>
                            <td>{{ $anggota->no_telp }}</td>
                            <td>
                                <a href="{{ route('admin.anggota.restore', $anggota)}}" class="btn btn-success">Restore</a>
                                <a href="{{ route('admin.anggota.delete', $anggota)}}" class="btn btn-danger">Delete Permanent</a>
                                
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection