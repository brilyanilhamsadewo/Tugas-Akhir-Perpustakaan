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
	
    <table class="table table-bordered">
        <thead class="thead-dark">
            <tr>
                <th>Nomor</th>
                <th>Nama</th>
                <th>NIS / NIP</th>
                <th>Jumlah Peminjaman</th>
                <th>Terdaftar Pada</th>
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
            @foreach ($users as $user)
                <tr>
                    <td>{{ $no++ }}</td>
                    <td>{{ $user->nama_member }}</td>
                    <td>{{ $user->nis_nip }}</td>
                    <td>{{ $user->borrow_count }}</td>
                    {{-- <td>{{ $user->created_at->diffForHumans() }}</td> --}}
                    <td>{{\Carbon\Carbon::parse($user->created_at)->format('d/m/Y')}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $users->links() }}
</body>
</html>