@extends('admin.templates.default')

@section('content')
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Edit Data Kategori</h3>
        </div>

        <div class="box-body">
            <form action="{{ route('admin.category.update', $author) }}" method="POST">
                @csrf
                @method("PUT")
                <div class="form-group @error('categories_name') has-error @enderror">
                    <label for="">Nama Kategori</label>
                    <input type="text" name="categories_name" class="form-control" placeholder="Masukkan nama kategori" value="{{ old('categories_name') ?? $author->categories_name}}">
                    @error('categories_name')
                        <span class="help-block">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <input type="submit" value="Ubah" class="btn btn-primary">
                </div>
            </form>
        </div>
    </div>
@endsection