@extends('admin.templates.default')

@section('content')
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Tambah Data Buku</h3>
        </div>

        <div class="box-body">
            <form action="{{ route('admin.book.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="form-group @error('title') has-error @enderror">
                    <label for="">Judul</label>
                    <input type="text" name="title" class="form-control" placeholder="Masukkan judul buku" value="{{ old('title') }}">
                    @error('title')
                        <span class="help-block">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group @error('issn') has-error @enderror">
                    <label for="">ISSN</label>
                    <input type="text" name="issn" class="form-control" placeholder="Masukkan ISSN buku" value="{{ old('issn') }}">
                    @error('issn')
                        <span class="help-block">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group @error('description') has-error @enderror">
                    <label for="">Deskripsi</label>
                    <textarea name="description" id="" rows="3" class="form-control" placeholder="Masukkan deskripsi buku">{{ old('description') }}</textarea>
                    @error('description')
                        <span class="help-block">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group @error('author_id') has-error @enderror">
                    <label for="">Penulis</label>
                    <select name="author_id" id="" class="form-control select2">
                        @foreach ($authors as $author)
                            <option value="{{ $author->id }}">{{ $author->name }}</option>
                        @endforeach
                    </select>
                    @error('author_id')
                        <span class="help-block">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group @error('category_id') has-error @enderror">
                    <label for="">Kategori</label>
                    <select name="category_id" id="" class="form-control select2">
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->categories_name }}</option>
                        @endforeach
                    </select>
                    @error('category_id')
                        <span class="help-block">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group @error('penerbit_id') has-error @enderror">
                    <label for="">Penerbit</label>
                    <select name="penerbit_id" id="" class="form-control select2">'
                        <option value="">Pilih penerbit</option>
                        @foreach ($penerbits as $penerbit)
                            <option value="{{ $penerbit->id }}">{{ $penerbit->nama_penerbit }}</option>
                        @endforeach
                    </select>
                    @error('penerbit_id')
                        <span class="help-block">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group @error('rak_id') has-error @enderror">
                    <label for="">Rak</label>
                    <select name="rak_id" id="" class="form-control select2">
                        <option value="">Pilih rak</option>
                        @foreach ($raks as $rak)
                            <option value="{{ $rak->id }}">{{ $rak->nama_rak." | ".$rak->lokasi_rak }}</option>
                        @endforeach
                    </select>
                    @error('rak_id')
                        <span class="help-block">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group @error('cover') has-error @enderror">
                    <label for="">Sampul</label>
                    <input type="file" name="cover" class="form-control">
                    @error('cover')
                        <span class="help-block">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group @error('qty') has-error @enderror">
                    <label for="">Jumlah</label>
                    <input type="text" name="qty" class="form-control" placeholder="Masukkan jumlah buku" value="{{ old('qty') }}">
                    @error('qty')
                        <span class="help-block">{{ $message }}</span>
                    @enderror
                </div>

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