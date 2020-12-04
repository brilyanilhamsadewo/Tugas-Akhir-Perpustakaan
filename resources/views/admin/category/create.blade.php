@extends('admin.templates.default')

@section('content')
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Tambah Data Kategori</h3>
        </div>

        <div class="box-body">
            <form action="{{ route('admin.category.store') }}" method="POST">
                @csrf

                <div class="form-group @error('name') has-error @enderror">
                    <label for="">Nama Kategori</label>
                    <input type="text" name="categories_name" class="form-control" placeholder="Masukkan nama kategori" value="{{ old('categories_name') }}">
                    @error('categories_name')
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