@extends('admin.templates.default')

@section('content')
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Tambah Data User</h3>
        </div>

        <div class="box-body">
            <form action="{{ route('admin.user.store') }}" method="POST">
                @csrf

                <div class="form-group @error('name') has-error @enderror">
                    <label for="">Nama</label>
                    <input type="text" name="name" class="form-control" placeholder="Masukkan nama user" value="{{ old('name') }}">
                    @error('name')
                        <span class="help-block">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group @error('email') has-error @enderror">
                    <label for="">Email</label>
                    <input type="email" name="email" class="form-control" placeholder="Masukkan email user" value="{{ old('email') }}">
                    @error('email')
                        <span class="help-block">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group @error('password') has-error @enderror">
                    <label for="">Password</label>
                    <input type="password" name="password" class="form-control" placeholder="Masukkan password" value="{{ old('password') }}">
                    @error('password')
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