<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Author;
use App\Book;
use App\Member;
use App\PinjamHistori;
use App\User;
use Carbon\Carbon;
use Illuminate\Support\Carbon as SupportCarbon;
use Illuminate\Support\Facades\DB;//query builder

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
            'members' => Member::orderBy('nama_member', 'ASC')->get(),
        ]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'member_id' => 'required',
            'book_id' => 'required',
            // 'tanggal_pinjam' => 'required',
            // 'tanggal_kembali' => 'required',
            // 'admin_id' => auth()->id(),
            // 'qty' => 'required|numeric',
        ]);

        $admin = auth()->id();
        // $tanggal_pinjam = Carbon::today();
        $tanggal_pinjam = \Carbon\Carbon::createFromFormat('Y-m-d H:s:i', today());
        // $tanggal_kembali = Carbon::today()->addDays(7);
        $tanggal_kembali = \Carbon\Carbon::createFromFormat('Y-m-d H:s:i', today()->addDays(7));
        // DB::table('books')->where('id',$request->book_id)->decrement('qty');

        PinjamHistori::create([
            'member_id' => $request->member_id,
            'book_id' => $request->book_id,
            'tanggal_pinjam' => $tanggal_pinjam,
            'tanggal_kembali' => $tanggal_kembali,
            'admin_id' => $admin,
            'status_pinjam' => 0,
            
            // 'qty' => $request->qty,
            // 'updated_at' =>$request->now(),
            // 'created_at' => $request->now(),
        ]);

        DB::table('books')->where('id',$request->book_id)->decrement('qty');

        return redirect()->route('admin.pinjam.index')->withSuccess('Data Peminjaman Berhasil Ditambahkan');
    }

    // public function modal(PinjamHistori $pinjam)
    // {
    //     return view('admin.pengembalian.modal', [
    //         'pinjam' => $pinjam,
    //         'title' => 'Pengembalian Buku',
    //         ]);
    // }
}
