@extends('admin.templates.default')

@section('content')
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Data User Terhapus</h3>
            {{-- <a href="{{ route('admin.author.create') }}" class="btn btn-danger">Delete All</a>
            <a href="{{ route('admin.author.trash') }}" class="btn btn-info">Restore All</a> --}}
            <a href="{{ route('admin.user.index') }}" class="btn btn-secondary">Back</a>
        </div>
        
        <div class="box-body">

            <table id="" class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>
                                <a href="{{ route('admin.user.restore', $user)}}" class="btn btn-success">Restore</a>
                                <a href="{{ route('admin.user.delete', $user)}}" class="btn btn-danger">Delete Permanent</a>
                                
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection