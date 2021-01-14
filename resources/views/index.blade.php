<!DOCTYPE html>
<html>
<head>
	<title>Tutorial Membuat Pencarian Pada Laravel - www.malasngoding.com</title>
</head>
<body>

	<style type="text/css">
		.pagination li{
			float: left;
			list-style-type: none;
			margin:5px;
		}
	</style>

	<h2><a href="https://www.malasngoding.com">www.malasngoding.com</a></h2>
	<h3>Data Buku</h3>


	<p>Cari Data Pegawai :</p>
	<form action="/pegawai/cari" method="GET">
		<input type="text" name="cari" placeholder="Cari Buku .." value="{{ old('cari') }}">
		<input type="submit" value="CARI">
	</form>
		
	<br/>

	<table border="1">
		<tr>
			<th>Title</th>
			<th>Description</th>
		</tr>
		@foreach($book as $b)
		<tr>
			<td>{{ $b->title }}</td>
			<td>{{ $b->description }}</td>
		</tr>
		@endforeach
	</table>

	<br/>
	Halaman : {{ $book->currentPage() }} <br/>
	Jumlah Data : {{ $book->total() }} <br/>
	Data Per Halaman : {{ $book->perPage() }} <br/>


	{{ $book->links() }}


</body>
</html>