<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Author;
use App\Book;
use App\PinjamHistori;
use App\User;

class PinjamController extends Controller
{
    //
    public function index()
    {
        return view('admin.peminjaman.index', [
            'title' => 'Data Buku yang dipinjam',
        ]);
    }

    public function create()
    {
        return view('admin.peminjaman.create', [
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
            'tanggal_pinjam' => 'required',
            'tanggal_kembali' => 'required',
            // 'admin_id' => auth()->id(),
            // 'qty' => 'required|numeric',
        ]);

        $admin = auth()->id();

        PinjamHistori::create([
            'user_id' => $request->user_id,
            'book_id' => $request->book_id,
            'tanggal_pinjam' => $request->tanggal_pinjam,
            'tanggal_kembali' => $request->tanggal_kembali,
            'admin_id' => $admin,
            'status_pinjam' => 0,
            
            // 'qty' => $request->qty,
            // 'updated_at' =>$request->now(),
            // 'created_at' => $request->now(),
        ]);

        return redirect()->route('admin.pinjam.index')->withSuccess('Data Peminjaman Berhasil Ditambahkan');
    }
}
