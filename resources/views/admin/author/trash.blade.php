@extends('admin.templates.default')

@section('content')
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Data Penulis Terhapus</h3>
            {{-- <a href="{{ route('admin.author.create') }}" class="btn btn-danger">Delete All</a>
            <a href="{{ route('admin.author.trash') }}" class="btn btn-info">Restore All</a> --}}
            <a href="{{ route('admin.author.index') }}" class="btn btn-secondary">Back</a>
        </div>
        
        <div class="box-body">

            <table id="" class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>Nomor</th>
                        <th>Nama</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @php $no = 1; @endphp
                    @foreach ($authors as $author)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ $author->name }}</td>
                            <td>
                                <a href="{{ route('admin.author.restore', $author)}}" class="btn btn-success">Restore</a>
                                <a href="{{ route('admin.author.delete', $author)}}" class="btn btn-danger">Delete Permanent</a>
                                
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection