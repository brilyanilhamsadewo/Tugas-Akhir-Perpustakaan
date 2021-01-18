<?php

namespace App\Http\Controllers\Admin;

use App\Author;
use App\Book;
use App\Http\Controllers\Controller;
use App\Member;
use App\PinjamHistori;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PeminjamanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $peminjaman = PinjamHistori::where('status_pinjam', '=', 0)->paginate(10);
        $anggota = Member::all();
        $petugas = User::all();
        $buku = Book::all();

        return view('admin.peminjamanv2.index', compact('anggota','petugas','buku','peminjaman'),[
            'title' => 'Data Peminjaman Buku',
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.peminjamanv2.create', [
            'title' => 'Tambah Peminjaman',
            'authors' => Author::orderBy('name', 'ASC')->get(),
            'books' => Book::orderBy('title', 'ASC')->get(),
            'members' => Member::orderBy('nama_member', 'ASC')->get(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
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

        return redirect()->route('admin.peminjaman.index')->withSuccess('Data Peminjaman Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
