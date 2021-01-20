@extends('admin.templates.default')

@section('content')
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Tambah Data Penerbit</h3>
        </div>

        <div class="box-body">
            <form action="{{ route('admin.penerbit.store') }}" method="POST">
                @csrf

                <div class="form-group @error('nama_penerbit') has-error @enderror">
                    <label for="">Nama Penerbit</label>
                    <input type="text" name="nama_penerbit" class="form-control" placeholder="Masukkan nama penerbit" value="{{ old('nama_penerbit') }}">
                    @error('nama_penerbit')
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