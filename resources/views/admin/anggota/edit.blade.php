@extends('admin.templates.default')

@section('content')
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Edit Data User</h3>
        </div>

        <div class="box-body">
            <form action="{{ route('admin.user.update', $user) }}" method="POST">
                @csrf
                @method("PUT")
                <div class="form-group @error('name') has-error @enderror">
                    <label for="">Nama</label>
                    <input type="text" name="name" class="form-control" placeholder="Masukkan nama user" value="{{ old('name') ?? $user->name}}">
                    @error('name')
                        <span class="help-block">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group @error('email') has-error @enderror">
                    <label for="">Email</label>
                    <input type="email" name="email" class="form-control" placeholder="Masukkan email user" value="{{ old('email') ?? $user->email}}">
                    @error('email')
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