<!DOCTYPE html>
<html>
<head>
    <title>Laporan Anggota Peminjaman Terbanyak</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</head>
<body>
	<h2 style="text-align: center">Laporan anggota dengan peminjaman terbanyak</h2>
	
        <table id="dataTable" class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>ISSN</th>
                    <th>Judul</th>
                    {{-- <th>Deskripsi</th> --}}
                    <th>Jumlah Buku</th>
                    <th>Total Dipinjam</th>
                    <th>Penulis</th>
                    {{-- <th>Sampul</th> --}}
                </tr>
            </thead>

            <tbody>
                @php
                    $page = 1;
                    if (request()->has('page')) {
                        $page = request('page');
                    }
                    $no = (10 * $page) - (10-1); //1
                @endphp
                @foreach ($books as $book)
                    <tr>
                        <td>{{ $book->issn }}</td>
                        <td>{{ $book->title }}</td>
                        {{-- <td>{{ $book->description }}</td> --}}
                        <td>{{ $book->qty }}</td>
                        <td>{{ $book->borrowed_count }}</td>
                        <td>{{ $book->author->name }}</td>
                        {{-- <td>
                            <img src="{{ $book->getCover() }}" height="150px" alt="{{ $book->title }}">
                        </td> --}}
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{-- {{ $books->links() }} --}}
</body>
</html>