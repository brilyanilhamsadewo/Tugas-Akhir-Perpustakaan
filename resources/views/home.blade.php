@extends('frontend.templates.default')

@section('content')
    <div class="row">
      <h2 style="text-align: center">Selamat Datang, {{ auth()->user()->name }}</h2>

      <div class="row">
        <div class="col s12 m4">
          <div class="card blue-grey darken-1">
            <div class="card-content white-text">
              <span class="card-title">Cari Buku</span>
              <p>Cari buku yang kalian inginkan yuk</p>
            </div>
            <div class="card-action">
              <a href="search">This is a link</a>
            </div>
          </div>
        </div>

        <div class="col s12 m4">
          <div class="card blue-grey darken-1">
            <div class="card-content white-text">
              <span class="card-title">Peminjaman Berjalan</span>
              <p>Pinjam buku yuk</p>
            </div>
            <div class="card-action">
              <a href="runningborrow">This is a link</a>
            </div>
          </div>
        </div>

        <div class="col s12 m4">
          <div class="card blue-grey darken-1">
            <div class="card-content white-text">
              <span class="card-title">Request Buku</span>
              <p>request buku yuk</p>
            </div>
            <div class="card-action">
              {{-- <p style="text-align: center"> --}}
                <a href="requestbuku">Click Here</a>
              {{-- </p>  --}}
            </div>
          </div>
        </div>
      </div>

      
                
        
    </div>
@endsection