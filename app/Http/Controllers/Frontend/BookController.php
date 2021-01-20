<?php

namespace App\Http\Controllers\Frontend;

use App\Book;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\BorrowHistory;
use App\Member;
use App\PinjamHistori;
use App\User;
use Illuminate\Support\Facades\DB;
use function Ramsey\Uuid\v1;

class BookController extends Controller
{
    public function index()
    {
        // $books = Book::paginate(2);

        // $book = DB::table('books')->paginate(10);
        $books = \App\Book::paginate(5);
        // $peminjaman = PinjamHistori::where('status_pinjam', '=', 0)->paginate(10);
        // $member = Member::all();
        // $user = User::all();
        // $book = Book::all();

        // return view('frontend.book.index', compact('user','member','peminjaman'),
        // [
        //     // 'books' => $books,
        //     'title' => 'Beranda Perpustakaan',
        //     'buku' => $buku,
        // ]);

        return view('frontend.book.index',compact('books'));
    }

    public function cari(Request $request)
	{
		// menangkap data pencarian
		$cari = $request->cari;
 
            // mengambil data dari table pegawai sesuai pencarian data
        $peminjaman = PinjamHistori::where('status_pinjam', '=', 0)->paginate(10);
        $member = Member::all();
        $user = User::all();
		$book = DB::table('books')
		->where('title','like',"%".$cari."%")
		->paginate();
 
    		// mengirim data pegawai ke view index
		return view('frontend.book.index',compact('user','member','peminjaman','book'));
 
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

        if($user->borrow()->isStillBorrow($book->id)) {
            return redirect()->back()->with('toast','Kamu sudah meminjam buku dengan judul '.$book->title);
        }

        $user->borrow()->attach($book);

        //mengurangi qty
        $book->decrement('qty');

        return redirect()->back()->with('toast','Berhasil Meminjam Buku');
    }
}
