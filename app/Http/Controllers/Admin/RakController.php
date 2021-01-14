<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Rak;
use Illuminate\Http\Request;

class RakController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.rak.index', [
            'title' => 'Data Rak',
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
        return view('admin.rak.create', [
            'title' => 'Tambah Rak',
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
        //
        $this->validate($request, [
            'nama_rak' => 'required|min:3',
            'lokasi_rak' => 'required|min:3',
        ]);

        Rak::create([
            'nama_rak' => $request->nama_rak,
            'lokasi_rak' => $request->lokasi_rak,
        ]);


        return redirect()->route('admin.rak.index')->with('success','Data rak berhasil ditambahkan');
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
    public function edit(Rak $rak)
    {
        //
        return view('admin.rak.edit', [
            'rak' => $rak,
            'title' => 'Edit Rak',
            ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Rak $rak)
    {
        //
        $this->validate($request, [
            'nama_rak' => 'required|min:3',
            'lokasi_rak' => 'required|min:3',
        ]);

        $rak->update([
            'nama_rak' => $request->nama_rak,
            'lokasi_rak' => $request->lokasi_rak,
        ]);

        return redirect()->route('admin.rak.index')->with('info','Data rak berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Rak $rak)
    {
        //
        $rak->delete();

        return redirect()->route('admin.rak.index')->with('danger','Data rak berhasil terhapus');
    }

    public function trash()
    {
        $raks = Rak::onlyTrashed()->get();

        return view('admin.rak.trash', compact('raks'));
    }

    public function restore(Rak $rak)
    {
        $rak->restore();
        return back();
    }

    public function delete(Rak $rak)
    {
        $rak->forceDelete();
        return back();
    }
}
