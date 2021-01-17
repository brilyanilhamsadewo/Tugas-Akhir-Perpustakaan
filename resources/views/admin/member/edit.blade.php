@extends('admin.templates.default')

@section('content')
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Edit Data Anggota</h3>
        </div>

        <div class="box-body">
            <form action="{{ route('admin.member.update', $member) }}" method="POST">
                @csrf
                @method("PUT")
                
                <div class="form-group @error('nis_nip') has-error @enderror">
                    <label for="">NIS / NIP</label>
                    <input type="text" name="nis_nip" class="form-control" placeholder="Masukkan NIS / NIP anggota" value="{{ old('nis_nip') ?? $member->nis_nip}}">
                    @error('nis_nip')
                        <span class="help-block">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group @error('nama_member') has-error @enderror">
                    <label for="">Nama Anggota</label>
                    <input type="text" name="nama_member" class="form-control" placeholder="Masukkan nama anggota" value="{{ old('nama_member') ?? $member->nama_member}}">
                    @error('nama_member')
                        <span class="help-block">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group @error('jenis_kelamin') has-error @enderror">
                    <label for="">Jenis Kelamin</label>
                    <select name="jenis_kelamin" id="" class="form-control select2" value="{{ old('jenis_kelamin') ?? $member->jenis_kelamin}}">
                        <option value="">--Pilih--</option>
                        <option value="L">Laki - Laki</option>
                        <option value="P">Perempuan</option>
                    </select>
                    @error('jenis_kelamin')
                        <span class="help-block">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group @error('no_telp_member') has-error @enderror">
                    <label for="">No Telp Anggota</label>
                    <input type="text" name="no_telp_member" class="form-control" placeholder="Masukkan nomor telepon anggota" value="{{ old('no_telp_member') ?? $member->no_telp_member}}">
                    @error('no_telp_member')
                        <span class="help-block">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group @error('email_member') has-error @enderror">
                    <label for="">Email Anggota</label>
                    <input type="email" name="email_member" class="form-control" placeholder="Masukkan email anggota" value="{{ old('email_member') ?? $member->email_member}}">
                    @error('email_member')
                        <span class="help-block">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group @error('alamat_member') has-error @enderror">
                    <label for="">Alamat Anggota</label>
                    <input type="text" name="alamat_member" class="form-control" placeholder="Masukkan email anggota" value="{{ old('alamat_member') ?? $member->alamat_member}}">
                    @error('alamat_member')
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