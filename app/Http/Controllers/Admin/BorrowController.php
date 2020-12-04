<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\BorrowHistory;
use App\Author;
use App\Book;
use App\User;

class BorrowController extends Controller
{
    //
    public function index()
    {
        return view('admin.borrow.index', [
            'title' => 'Data Buku yang dipinjam',
        ]);
    }

    public function create()
    {
        return view('admin.borrow.create', [
            'title' => 'Tambah Peminjaman',
            'authors' => Author::orderBy('name', 'ASC')->get(),
            'books' => Book::orderBy('title', 'ASC')->get(),
            'users' => User::orderBy('name', 'ASC')->get(),
        ]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'user_id' => 'required',
            'book_id' => 'required',
            // 'qty' => 'required|numeric',
        ]);

        BorrowHistory::create([
            'user_id' => $request->user_id,
            'book_id' => $request->book_id,
            // 'qty' => $request->qty,
            // 'updated_at' =>$request->now(),
            // 'created_at' => $request->now(),
        ]);

        return redirect()->route('admin.borrow.index')->withSuccess('Data Peminjaman Berhasil Ditambahkan');
    }

    public function returnBook(Request $request, BorrowHistory $borrowHistory)
    {
        $borrowHistory->update([
            'returned_at' => Carbon::now(),
            'admin_id' => auth()->id(),
        ]);

        $borrowHistory->book()->increment('qty');

        return redirect()->back()->withSuccess('Buku dikembalikan');
    }
}
