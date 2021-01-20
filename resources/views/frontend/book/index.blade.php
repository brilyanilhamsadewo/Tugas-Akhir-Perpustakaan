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
    @foreach($books as $b)
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
Halaman : {{ $books->currentPage() }} <br/>
Jumlah Data : {{ $books->total() }} <br/>
Data Per Halaman : {{ $books->perPage() }} <br/>


{{ $books->links() }}


@endsection