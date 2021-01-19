@extends('frontend.templates.default')

@section('content')
{{-- <h2>Koleksi Buku</h2> --}}
<blockquote>
    <p class="flow-text">Koleksi buku yang bisa kamu baca & pinjam !</p>
</blockquote>

	<p>Cari Data Buku :</p>
	<form action="/pegawai/cari" method="GET">
		<input type="text" name="cari" placeholder="Masukkan judul buku" value="{{ old('cari') }}">
		<input type="submit" value="CARI" class="btn btn-primary">
	</form>
		
	<br/>

	<table border="1">
		<tr>
			<th>Title</th>
			<th>ISSN</th>
			<th>Jumlah Tersedia</th>
			<th>Description</th>
		</tr>
		@foreach($book as $b)
		<tr>
			<td>{{ $b->title }}</td>
			<td>{{ $b->issn }}</td>
			<td>{{ $b->qty }}</td>
			<td>{{ $b->description }}</td>
		</tr>
		@endforeach
	</table>

	<br/>
	Halaman : {{ $book->currentPage() }} <br/>
	Jumlah Data : {{ $book->total() }} <br/>
	Data Per Halaman : {{ $book->perPage() }} <br/>


	{{ $book->links() }}


@endsection