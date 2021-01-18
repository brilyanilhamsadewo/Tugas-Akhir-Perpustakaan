@extends('admin.templates.default')

@section('content')
<div class="box">
    <div class="box-header">
        <h3 class="box-title">Pengembalian Buku</h3>
        {{-- <a href="{{ route('admin.pinjam.create')}}" class="btn btn-primary">Tambah Peminjaman</a> --}}
        {{-- <a href="#" class="">History Pengembalian</a> --}}
    </div>
    
    <div class="box-body">
                {{-- <h3>Form Edit Buku</h3> --}}
                @foreach($pinjam as $pinjam)
        <form action="{{url('admin/pengembalian/simpan_pengembalian/'.$pinjam->id)}}" method="get">
            {{ csrf_field() }}
            <div class="form-group">
                <!-- <label for="id_buku">ID Buku</label> -->
                <input class="form-control" type="hidden" name="id_peminjaman" id="id_peminjaman" placeholder="Masukkan ID Buku" value="{{$pinjam->id}}">
            </div>
    
            <div class="form-group @error('user_id') has-error @enderror">
                <label for="">NIS / NIP</label>
                <input type="text" name="user_id" class="form-control" placeholder="Masukkan NIS / NIP anggota" value="{{ $user_id }}" readonly>
                @error('user_id')
                    <span class="help-block">{{ $message }}</span>
                @enderror
            </div>
    
            <div class="form-group @error('peminjam_buku') has-error @enderror">
                <label for="">Peminjam Buku</label>
                <input type="text" name="peminjam_buku" class="form-control" placeholder="Masukkan NIS / NIP anggota" value="{{ $peminjam_buku }}" readonly>
                @error('peminjam_buku')
                    <span class="help-block">{{ $message }}</span>
                @enderror
            </div>
    
            <div class="form-group @error('judul_buku') has-error @enderror">
                <label for="">Judul Buku</label>
                <input type="text" name="judul_buku" class="form-control" placeholder="Masukkan NIS / NIP anggota" value="{{ $judul_buku }}" readonly>
                @error('judul_buku')
                    <span class="help-block">{{ $message }}</span>
                @enderror
            </div> 
    
            <div class="form-group @error('tanggal_pinjam') has-error @enderror">
                <label for="">Tanggal Pinjam</label>
                <input type="text" name="tanggal_pinjam" class="form-control" placeholder="Masukkan NIS / NIP anggota" value="{{ $tanggal_pinjam }}" readonly>
                @error('tanggal_pinjam')
                    <span class="help-block">{{ $message }}</span>
                @enderror
            </div>     
            
    
            <div class="form-group @error('tanggal_kembali') has-error @enderror">
                <label for="">Tanggal Kembali</label>
                <input type="text" name="tanggal_kembali" class="form-control" placeholder="Masukkan NIS / NIP anggota" value="{{ $tanggal_kembali }}" readonly>
                @error('tanggal_kembali')
                    <span class="help-block">{{ $message }}</span>
                @enderror
            </div>    
            
    
            <div class="form-group @error('tanggal_kembali_aktual') has-error @enderror">
                <label for="">Tanggal Kembali Aktual</label>
                <input type="text" name="tanggal_kembali_aktual" class="form-control" placeholder="Masukkan NIS / NIP anggota" value="{{ $tanggal_kembali_aktual }}" readonly>
                @error('tanggal_kembali_aktual')
                    <span class="help-block">{{ $message }}</span>
                @enderror
            </div>
    
            <div class="form-group @error('denda') has-error @enderror">
                <label for="">Denda</label>
                <input type="text" name="denda" class="form-control" placeholder="Masukkan NIS / NIP anggota" value="Rp {{ $denda }}">
                @error('denda')
                    <span class="help-block">{{ $message }}</span>
                @enderror
            </div>
    
            <div class="form-group float-right">
                {{-- <button class="btn btn-lg btn-danger" type="reset" href="{{ route('admin.pengembalian.index') }}">Cancel</button> --}}
                <button class="btn btn-lg btn-primary" type="submit">Simpan Pengembalian</button>
            </div>
        </form>
        @endforeach
    <!-- /.content -->
    </div>

</div>

<!-- Main Section -->

<!-- /.Main Section -->

@endsection

@push('styles')
<link rel="stylesheet" href="{{ asset('assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
@endpush

@push('scripts')
    <script src="{{ asset('assets/bower_components/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/bs-notify.min.js') }}"></script>
    @include('admin.templates.partials.alerts')
    <script>
        $(function () {
            $('#dataTable').DataTable({
                // processing: true,
                // serverSide: true,
                // ajax: '{{ route('admin.kembali.data') }}',
                // columns: [
                //     { data: 'DT_RowIndex', orderable: false, searchable : false},
                //     { data: 'user'},
                //     { data: 'book_title'},
                //     { data: 'nama_admin'},
                //     { data: 'tanggal_pinjam'},
                //     { data: 'tanggal_kembali'},
                //     { data: 'action'},
                //     // { data: '#'}
                // ]
            });
        });
    </script>


@endpush