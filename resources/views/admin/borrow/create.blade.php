@extends('admin.templates.default')

@section('content')
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Tambah Data Peminjaman</h3>
        </div>

        <div class="box-body">
            <form action="{{ route('admin.borrow.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="form-group @error('user_id') has-error @enderror">
                    <label for="">Nama Peminjam</label>
                    <select name="user_id" id="" class="form-control select2">
                        @foreach ($users as $user)
                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                        @endforeach
                    </select>

                <div class="form-group @error('book_id') has-error @enderror">
                    <label for="">Judul Buku</label>
                    <select name="book_id" id="" class="form-control select2">
                        @foreach ($books as $book)
                            <option value="{{ $book->id }}">{{ $book->title.$book->issn}}</option>
                        @endforeach
                    </select>
                    @error('book_id')
                        <span class="help-block">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group @error('must_return') has-error @enderror">
                    <label for="">Must Return</label>
                    <input type="date" name="must_return" class="form-control" placeholder="Masukkan Tanggal Harus Kembali" value="{{ old('must_return') }}">
                    @error('name')
                        <span class="help-block">{{ $message }}</span>
                    @enderror
                </div>

                {{-- <div class="form-group @error('qty') has-error @enderror">
                    <label for="">Jumlah</label>
                    <input type="number" name="qty" class="form-control" placeholder="Masukkan jumlah buku" value="{{ old('qty') }}">
                    @error('qty')
                        <span class="help-block">{{ $message }}</span>
                    @enderror
                </div> --}}

                <div class="form-group">
                    <input type="submit" value="Tambah" class="btn btn-primary">
                </div>
            </form>
        </div>
    </div>
@endsection

@push('select2css')
    <link rel="stylesheet" href="{{ asset('assets/bower_components/select2/dist/css/select2.min.css') }}">
@endpush

@push('scripts')
    <script src="{{ asset('assets/bower_components/select2/dist/js/select2.full.min.js') }}"></script>
    <script>
        $('.select2').select2();
    </script>
@endpush