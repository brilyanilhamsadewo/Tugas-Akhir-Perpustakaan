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
use Illuminate\Support\Facades\DB;//query builder
use DateTime;

class PengembalianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return view('admin.pengembalian.index', [
        //     'title' => 'Data Buku yang dipinjam',
        // ]);
        $peminjaman = PinjamHistori::where('status_pinjam', '=', 0)->paginate(10);
        // $member = Member::all();
        $user = Member::all();
        $book = Book::all();
        
        // $fdate = DB::table('peminjamans')->find($id)->tanggal_pinjam;
        // $tdate = now();
        // $interval = $fdate->diff($tdate);
        // $days = $interval->format('%a');
        // $denda = $days*1000;


        // return view('admin.peminjaman.peminjaman', ['peminjaman' => $peminjaman]);
        return view('admin.pengembalian.index',compact('user','book','peminjaman'));
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
		return view('admin.pengembalian.kembalikan',['pinjam' => $pinjam],compact('judul_buku','peminjam_buku','user_id','tanggal_pinjam','tanggal_kembali','tanggal_kembali_aktual','denda'));
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
        // $this->validate($request,[
        //     // 'ID_PEMINJAMAN' => 'required',
    	// 	'ID_ANGGOTA' => 'required',
        //     'ID_BUKU' => 'required',
        //     'ID_PETUGAS' => 'required',
        //     'TANGGAL_PINJAM' => 'required',
        //     'TANGGAL_KEMBALI' => 'required'
    	// ]);
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
        
        
        return redirect()->route('admin.pengembalian.index')->withSuccess('Pengembalian Sukses');
        // return redirect('admin.pengembalian.index');//notifikasi
    }

    public function loadData_buku(Request $request)
    {
        if ($request->has('q')) {
            $cari = $request->q;
            $data = DB::table('books')->select('id', 'title')->where('title', 'like',"%".$cari."%")->get();
            return response()->json($data);
        }
	}
}