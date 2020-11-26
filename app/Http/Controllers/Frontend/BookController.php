<?php

namespace App\Http\Controllers\Frontend;

use App\Book;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\BorrowHistory;
use App\User;

use function Ramsey\Uuid\v1;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::paginate(10);

        return view('frontend.book.index', [
            'books' => $books,
            'title' => 'Beranda Perpustakaan',
        ]);
    }

    public function show(Book $book)
    {
        return view('frontend.book.show', [
            'title' => $book->title,
            'book' => $book,
        ]);
    }

    public function borrow(Book $book)
    {
        $user = auth()->user();

        if($user->borrow()->where('books.id', $book->id)->count() > 0) {
            return redirect()->back()->with('toast','Kamu sudah meminjam buku dengan judul '.$book->title);
        }

        $user->borrow()->attach($book);

        //mengurangi qty
        $book->decrement('qty');

        return redirect()->back()->with('toast','Berhasil Meminjam Buku');
    }
}
