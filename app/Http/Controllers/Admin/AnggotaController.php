<?php

namespace App\Http\Controllers\Admin;

use App\Anggota;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AnggotaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.anggota.index', [
            'title' => 'Data Anggota',
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.anggota.create', [
            'title' => 'Tambah Anggota',
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
            'nis_nig' => 'required|numeric',
            'nama' => 'required|min:3',
            'tahun_masuk' => 'required|numeric',
            'jenis_kelamin' => 'required',
            'no_telp' => 'required|numeric',
        ]);

        Anggota::create([
            'nis/nig' => $request->nis_nig,
            'nama' => $request->nama,
            'tahun_masuk' => $request->tahun_masuk,
            'jenis_kelamin' => $request->jenis_kelamin,
            'no_telp' => $request->no_telp,
        ]);

        return redirect()->route('admin.anggota.index')->with('success','Data anggota berhasil ditambahkan');
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
    public function edit(Anggota $anggota)
    {
        return view('admin.anggota.edit', [
            'anngota' => $anggota,
            'title' => 'Edit Anggota',
            ]);
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

    public function trash()
    {
        $anggotas = Anggota::onlyTrashed()->get();

        return view('admin.anggota.trash', compact('anggotas'));
    }
}
