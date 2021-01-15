@extends('admin.templates.default')

@section('content')
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Tambah Data Peminjaman</h3>
        </div>

        <div class="box-body">
            <form action="{{ route('admin.pinjam.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="form-group @error('user_id') has-error @enderror">
                    <label for="">Nama Peminjam</label>
                    <select name="user_id" id="" class="form-control select2">
                        @foreach ($users as $user)
                            <option value="{{ $user->id }}">{{ $user->name." | ".$user->id }}</option>
                        @endforeach
                    </select>

                <div class="form-group @error('book_id') has-error @enderror">
                    <label for="">Judul Buku</label>
                    <select name="book_id" id="" class="form-control select2">
                        <option value="">Ketikkan Judul Buku atau ISSN Buku</option>
                        @foreach ($books as $book)
                            {{-- <option value="Masukkan Judul Buku atau ISSN Buku"</option> --}}
                            <option value="{{ $book->id }}">{{ $book->title." | ".$book->issn}}</option>
                        @endforeach
                    </select>
                    @error('book_id')
                        <span class="help-block">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group @error('tanggal_pinjam') has-error @enderror">
                    <label for="">Tanggal Pinjam</label>
                    <input type="date" name="tanggal_pinjam" class="form-control" placeholder="Masukkan Tanggal Pinjam" value="{{ old('tanggal_pinjam') }}">
                    @error('tanggal_pinjam')
                        <span class="help-block">{{ $message }}</span>
                    @enderror
                </div>

                {{-- <div class="form-group">
                    <label for="tahun_terbit">Tanggal Pinjam</label>
                    <!-- <input class="date form-control" type="text" name="TANGGAL_PINJAM" id="TANGGAL_PINJAM" placeholder="" autocomplete="off"> -->
                    <div class="start_date input-group mb-4">
                    <input class="form-control date" type="text" placeholder="Tanggal Pinjam" id="TANGGAL_PINJAM" autocomplete="off">
                        <div class="input-group-append">
                        <span class="fa fa-calendar input-group-text start_date_calendar" aria-hidden="true "></span>
                        </div>
                    </div>
                </div> --}}

                <div class="form-group @error('tanggal_kembali') has-error @enderror">
                    <label for="">Tanggal Kembali</label>
                    <input type="date" name="tanggal_kembali" class="form-control" placeholder="Masukkan Tanggal Pengembalian" value="{{ old('tanggal_kembali') }}">
                    @error('tanggal_kembali')
                        <span class="help-block">{{ $message }}</span>
                    @enderror
                </div>

                {{-- <div class="form-group @error('qty') has-error @enderror">
                    <label for="">Jumlah</label>
                    <input type="number" name="qty" class="form-control" placeholder="Masukkan jumlah buku" value="{{ old('qty') }}">
                    @error('qty')
                        <span class="help-block">{{ $message }}</span>
                    @enderror
                </div> --}}

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
    <script type="text/javascript">

        $('.date').datepicker({  

            startDate: new Date(),
            format: 'yyyy-mm-dd',
            todayHighlight:'TRUE',
            autoclose: true

        });  
    </script>
    <script src="{{ asset('assets/bower_components/select2/dist/js/select2.full.min.js') }}"></script>
    <script>
        $('.select2').select2();
    </script>
@endpush