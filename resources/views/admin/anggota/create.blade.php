@extends('admin.templates.default')

@section('content')
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Tambah Data Anggota</h3>
        </div>

        <div class="box-body">
            <form action="{{ route('admin.anggota.store') }}" method="POST">
                @csrf

                <div class="form-group @error('nis_nig') has-error @enderror">
                    <label for="">NIS / NIG</label>
                    <input type="number" name="nis_nig" class="form-control" placeholder="Masukkan NIS / NIG" value="{{ old('nis_nig') }}">
                    @error('nis_nig')
                        <span class="help-block">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group @error('nama') has-error @enderror">
                    <label for="">Nama</label>
                    <input type="text" name="nama" class="form-control" placeholder="Masukkan nama anggota" value="{{ old('nama') }}">
                    @error('nama')
                        <span class="help-block">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group @error('tahun_masuk') has-error @enderror">
                    <label for="">Tahun Masuk</label>
                    <input type="number" name="tahun_masuk" class="form-control" placeholder="Masukkan Tahun Masuk Anggota" value="{{ old('tahun_masuk') }}">
                    @error('tahun_masuk')
                        <span class="help-block">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group @error('jenis_kelamin') has-error @enderror">
                    <label for="">Jenis Kelamin</label>
                    <select name="jenis_kelamin" id="" class="form-control select2">
                        <option value="">Pilih Jenis Kelamin</option>
                        <option value="L">Laki - Laki</option>
                        <option value="P">Perempuan</option>
                    </select>
                    @error('jenis_kelamin')
                        <span class="help-block">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group @error('no_telp') has-error @enderror">
                    <label for="">No Telepon</label>
                    <input type="text" name="no_telp" class="form-control" placeholder="Masukkan no telepon anggota" value="{{ old('no_telp') }}">
                    @error('no_telp')
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