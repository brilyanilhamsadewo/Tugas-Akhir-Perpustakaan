@extends('admin.templates.default')

@section('content')
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Tambah Data Rak</h3>
        </div>

        <div class="box-body">
            <form action="{{ route('admin.rak.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="form-group @error('nama') has-error @enderror">
                    <label for="">Nama Rak</label>
                    <input type="text" name="nama_rak" class="form-control" placeholder="Masukkan nama rak" value="{{ old('nama_rak') }}">
                    @error('nama')
                        <span class="help-block">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group @error('lokasi') has-error @enderror">
                    <label for="">Lokasi Rak</label>
                    <input type="text" name="lokasi_rak" class="form-control" placeholder="Masukkan lokasi rak buku" value="{{ old('lokasi_rak') }}">
                    @error('lokasi')
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