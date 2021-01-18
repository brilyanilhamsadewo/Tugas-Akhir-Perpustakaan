@extends('frontend.templates.default')

@section('content')
{{-- <h2>Koleksi Buku</h2> --}}
<blockquote>
    <p class="flow-text">Koleksi buku yang bisa kamu baca & pinjam !</p>
</blockquote>

<p>Cari Buku :</p>
	<form action="/pegawai/cari" method="GET">
		<input type="text" name="cari" placeholder="Masukkan judul buku" value="{{ old('cari') }}">
		<input type="submit" value="CARI" class="btn btn-primary">
	</form>
		
	<br/>

<table border="1" class="striped">
    <tr>
        <th>Judul Buku</th>
        <th>ISSN</th>
        <th>Pengarang</th>
        <th>Penerbit</th>
        <th>Jumlah Tersedia</th>
        {{-- <th>Description</th> --}}
    </tr>
    @foreach($book as $b)
    <tr>
        <td>{{ $b->title }}</td>
        <td>{{ $b->issn }}</td>
        <td>{{ $b->author->name }}</td>
        <td>{{ $b->penerbit->nama_penerbit }}</td>
        {{-- <td>{{ $b->book->author->name }}</td> --}}
        <td>{{ $b->qty }}</td>
        {{-- <td>{{ $b->description }}</td> --}}
    </tr>
    @endforeach
</table>

<br/>
Halaman : {{ $book->currentPage() }} <br/>
Jumlah Data : {{ $book->total() }} <br/>
Data Per Halaman : {{ $book->perPage() }} <br/>


{{ $book->links() }}


{{-- <table id="dataTable" class="table table-bordered table-hover">
    <thead>
        <tr>
            <th>Nomor</th>
            <th>Judul</th>
            <th>Penerbit</th>
            <th>Rak</th>
            <th>ISSN</th>
            <th>Deskripsi</th>
            <th>Jumlah Buku</th>
            <th>Penulis</th> --}}
            {{-- <th>Sampul</th> --}}
            {{-- <th>Aksi</th> --}}
        {{-- </tr>
    </thead>
</table> --}}

<script>
    // $(function () {
        // $('#dataTable').DataTable({
            // processing: true,
            // serverSide: true,
            // ajax: '{{ route('admin.book.data') }}',
            // columns: [
            //     { data: 'DT_RowIndex', orderable: false, searchable : false},
            //     { data: 'title'},
            //     { data: 'penerbit'},
            //     { data: 'rak'},
            //     { data: 'issn'},
            //     { data: 'description'},
            //     { data: 'qty'},
            //     { data: 'author'},
            //     { data: 'cover'},
            //     { data: 'action'},
            // ]
        // });
    // });
</script>
{{-- <div class="row"> --}}
    
    {{-- @foreach ($books as $book)
        @include('frontend.templates.components.card-book', ['book' => $book])
    @endforeach --}}
{{-- </div> --}}
{{-- Pagination --}}
{{-- {{ $books->links('vendor.pagination.materialize') }} --}}
@endsection