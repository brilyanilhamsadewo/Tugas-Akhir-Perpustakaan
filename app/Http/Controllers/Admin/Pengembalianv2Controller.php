<?php

namespace App\Http\Controllers\Admin;

use App\Book;
use App\Http\Controllers\Controller;
use App\Member;
use App\Pengembalian;
use App\PinjamHistori;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Pengembalianv2Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $peminjaman = PinjamHistori::where('status_pinjam', '=', 0)->paginate(10);
        $member = Member::all();
        $user = User::all();
        $book = Book::all();
        return view('admin.pengembalianv2.index',compact('user','member','book','peminjaman'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
         // mengambil data petugas berdasarkan id yang dipilih
		$pinjam = DB::table('peminjamans')->where('id',$id)->get();
        // $member = DB::table('members')->pluck("nama_member","id");
        $user_id = PinjamHistori::find($id)->user_id;
        $nis_nip = PinjamHistori::find($id)->member->nis_nip;
        $peminjam_buku = PinjamHistori::find($id)->member->nama_member;
        $judul_buku = PinjamHistori::find($id)->book->title;
        $tanggal_pinjam = PinjamHistori::find($id)->tanggal_pinjam;;
        $tanggal_kembali = PinjamHistori::find($id)->tanggal_kembali;;
        $tanggal_kembali_aktual = Carbon::today();

        // $to = DB::table('peminjamans')->pluck('tanggal_kembali');
        // $from = \Carbon\Carbon::createFromFormat('Y-m-d H:s:i', today());
        // $diff_in_days = $to->diffInDays($from);
        // print_r($diff_in_days); // Output: 1

        $start = PinjamHistori::find($id)->tanggal_kembali;
        $end = \Carbon\Carbon::createFromFormat('Y-m-d H:s:i', today());
        if ($start<$end) {
            $diff_in_days = Carbon::parse($end)->diffInDays($start);
            // $denda = $diff_in_days*1000;
        } else {
            $diff_in_days = 0;
        }
        // $diff_in_days = Carbon::parse($end)->diffInDays($start);
        $denda = $diff_in_days*1000;
		return view('admin.pengembalianv2.kembalikan',['pinjam' => $pinjam],compact('judul_buku','peminjam_buku','user_id','tanggal_pinjam','tanggal_kembali','tanggal_kembali_aktual','denda','nis_nip'));
		// passing data petugas yang didapat ke view 
		// return view('admin.buku.edit_buku',['buku' => $buku]);
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

    public function simpan_pengembalian(Request $request, $id){
        $now = now();
        $peminjaman = PinjamHistori::find($id);
        $peminjaman->status_pinjam = 1;
        $peminjaman->save();
        DB::table('books')->where('id',$peminjaman->book_id)->increment('qty');

        $start = PinjamHistori::find($id)->tanggal_kembali;
        $end = \Carbon\Carbon::createFromFormat('Y-m-d H:s:i', today());
        if ($start<$end) {
            $diff_in_days = Carbon::parse($end)->diffInDays($start);
        } else {
            $diff_in_days = 0;
        }
        $denda = $diff_in_days*1000;

        Pengembalian::create([
            'peminjaman_id' => $id,
            'tanggal_pengembalian' => $now,
            'denda' => $denda,
            // 'admin' =>$admin
        ]);
        
        
        return redirect()->route('admin.pengembalianv2.index')->withSuccess('Pengembalian Sukses');
        // return redirect('admin.pengembalian.index');//notifikasi
    }

    public function history()
    {
        $peminjaman = PinjamHistori::where('status_pinjam', '=', 1)->paginate(10);
        $member = Member::all();
        $user = User::all();
        $book = Book::all();
        return view('admin.pengembalianv2.history',compact('user','member','book','peminjaman'));
    }
}
