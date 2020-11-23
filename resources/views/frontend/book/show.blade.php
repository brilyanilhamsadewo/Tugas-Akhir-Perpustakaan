@extends('frontend.templates.default')

@section('content')
<div class="col s12 m12">
    <div class="card horizontal hoverable">
        {{-- <div class="card-image"> --}}
          <img src="{{ $book->getCover() }}">
        {{-- </div> --}}
        <div class="card-stacked">
          <div class="card-content">
              <h4 class="red-text accent-2">{{ $book->title }}</h4>
            <blockquote>
              <p>{{ $book->description }}</p>
            </blockquote>
            <p>
              <i class="material-icons">person</i> : {{ $book->author->name }}
            </p>
            <p>
              <i class="material-icons">book</i> : {{ $book->qty }}
            </p>
          </div>
          <div class="card-action">
            <a href="#" class="btn red accent-1 right waves-effect waves-light">Pinjam Buku</a>
          </div>
        </div>
    </div>
</div>
@endsection