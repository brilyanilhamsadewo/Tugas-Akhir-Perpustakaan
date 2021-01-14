<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PegawaiController extends Controller
{
    public function index()
	{
    		// mengambil data dari table pegawai
		$book = DB::table('books')->paginate(10);
 
    		// mengirim data pegawai ke view index
		return view('index',['book' => $book]);
 
	}
 
	public function cari(Request $request)
	{
		// menangkap data pencarian
		$cari = $request->cari;
 
    		// mengambil data dari table pegawai sesuai pencarian data
		$book = DB::table('books')
		->where('title','like',"%".$cari."%")
		->paginate();
 
    		// mengirim data pegawai ke view index
		return view('index',['book' => $book]);
 
	}
}
