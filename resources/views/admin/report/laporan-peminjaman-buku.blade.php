<!DOCTYPE html>
<html>
<head>
    <title>Laporan Peminjaman Buku</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</head>
<body>
	<h2 style="text-align: center">Laporan Peminjaman Buku</h2>
	
        <table id="dataTable" class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>ID Peminjaman</th>
                    <th>Nama Peminjam</th>
                    <th>NIS / NIP</th>
                    <th>Judul Buku</th>
                    <th>ISSN</th>
                    {{-- <th>Nama Petugas</th> --}}
                    <th>Tanggal Pinjam</th>
                    {{-- <th>Tanggal Kembali</th> --}}
                </tr>
            </thead>
    
                <tbody>
                    {{-- @php
                        $page = 1;
                        if (request()->has('page')) {
                            $page = request('page');
                        }
                        $no = (10 * $page) - (10-1); //1
                    @endphp --}}
                    @foreach($peminjaman as $p)
        
                    <tr>
                        <td>{{$p->id}}</td>
                        <td>{{$p->member->nama_member}}</td>
                        <td>{{$p->member->nis_nip}}</td>
                        <td>{{$p->book->title}}</td>
                        <td>{{$p->book->issn}}</td>
                        {{-- <td>{{$p->user->name}}</td> --}}
                        <td>{{\Carbon\Carbon::parse($p->tanggal_pinjam)->format('d/m/Y')}}</td>
                        {{-- <td>{{\Carbon\Carbon::parse($p->tanggal_kembali)->format('d/m/Y')}}</td> --}}
                        {{-- <td>
                        <!-- fontawesome  -->
                            <!-- <a href="{{url('/peminjaman/peminjaman/edit/'.$p->ID_PEMINJAMAN)}}" class="badge badge-success"><i class="fas fa-edit"></i> Edit Peminjaman</a> -->
                            <a href="{{url('/peminjaman/peminjaman/simpan_pengembalian/'.$p->ID_PEMINJAMAN)}}" class="badge badge-success"><i class="fas fa-edit"></i> Kembalikan</a>
                            <!-- <a href="{{url('/peminjaman/hapusSementara/'.$p->ID_PEMINJAMAN)}}" onclick="return confirm('Are you sure?')" class="badge badge-danger"><i class="fas fa-times"></i> Hapus Sementara</a> -->
                        </td> --}}
                        
                    </tr>
                    @endforeach
                </tbody>
        </table>
        {{-- {{ $books->links() }} --}}
</body>
</html>