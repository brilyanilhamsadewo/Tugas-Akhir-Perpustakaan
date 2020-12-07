@extends('admin.templates.default')

@section('content')
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Data Buku Terhapus</h3>
            {{-- <a href="{{ route('admin.author.create') }}" class="btn btn-danger">Delete All</a>
            <a href="{{ route('admin.author.trash') }}" class="btn btn-info">Restore All</a> --}}
            <a href="{{ route('admin.book.index') }}" class="btn btn-secondary">Back</a>
        </div>
        
        <div class="box-body">

            <table id="" class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Judul</th>
                        <th>ISSN</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($books as $book)
                        <tr>
                            <td>{{ $book->id }}</td>
                            <td>{{ $book->title }}</td>
                            <td>{{ $book->issn }}</td>
                            <td>
                                <a href="{{ route('admin.book.restore', $book)}}" class="btn btn-success">Restore</a>
                                <a href="{{ route('admin.book.delete', $book)}}" class="btn btn-danger">Delete Permanent</a>
                                
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection