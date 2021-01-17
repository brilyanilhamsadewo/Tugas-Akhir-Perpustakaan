@extends('admin.templates.default')

@section('content')
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Data Anggota Terhapus</h3>
            <a href="{{ route('admin.member.index') }}" class="btn btn-secondary">Back</a>
        </div>
        
        <div class="box-body">

            <table id="" class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>Nomor</th>
                        <th>NIS / NIP</th>
                        <th>Nama</th>
                        <th>Jenis Kelamin</th>
                        <th>No Telepon</th>
                        <th>Email</th>
                        <th>Alamat</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @php $no = 1; @endphp
                    @foreach ($members as $member)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ $member->nis_nip }}</td>
                            <td>{{ $member->nama_member }}</td>
                            <td>{{ $member->jenis_kelamin }}</td>
                            <td>{{ $member->no_telp_member }}</td>
                            <td>{{ $member->email_member }}</td>
                            <td>{{ $member->alamat_member }}</td>
                            <td>
                                <a href="{{ route('admin.member.restore', $member)}}" class="btn btn-success">Restore</a>
                                <a href="{{ route('admin.member.delete', $member)}}" class="btn btn-danger">Delete Permanent</a>
                                
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection