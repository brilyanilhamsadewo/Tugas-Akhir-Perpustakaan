@extends('admin.templates.default')

@section('content')
<div class="box">
    <div class="box-header">
        <h3 class="box-title">Laporan User Teraktif</h3>
        {{-- <a href="{{ route('admin.report.laporan-pdf') }}" class="btn btn-primary">TEst</a> --}}
        <a href="{{ route('admin.report.laporan-top-user') }}" class="btn btn-primary">Cetak</a>
    </div>

    <div class="box-body">
        <table id="dataTable" class="table table-bordered table-hover">
            <thead>
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
    </div>
</div>

@endsection