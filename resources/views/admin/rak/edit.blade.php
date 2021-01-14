@extends('admin.templates.default')

@section('content')
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Edit Data Rak</h3>
        </div>

        <div class="box-body">
            <form action="{{ route('admin.rak.update', $rak) }}" method="POST">
                @csrf
                @method("PUT")
                <div class="form-group @error('nama_rak') has-error @enderror">
                    <label for="">Nama Rak</label>
                    <input type="text" name="nama_rak" class="form-control" placeholder="Masukkan nama rak" value="{{ old('nama_rak') ?? $rak->nama_rak}}">
                    @error('nama_rak')
                        <span class="help-block">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group @error('lokasi_rak') has-error @enderror">
                    <label for="">Lokasi Rak</label>
                    <input type="text" name="lokasi_rak" class="form-control" placeholder="Masukkan lokasi rak" value="{{ old('lokasi_rak') ?? $rak->lokasi_rak}}">
                    @error('lokasi_rak')
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