<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Penerbit;
use Illuminate\Http\Request;

class PenerbitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.penerbit.index', [
            'title' => 'Data Penerbit',
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
        return view('admin.penerbit.create', [
            'title' => 'Tambah Penerbit',
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
            'nama_penerbit' => 'required|min:3',
        ]);
        Penerbit::create($request->only('nama_penerbit'));

        return redirect()->route('admin.penerbit.index')->with('success','Data penerbit berhasil ditambahkan');
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
    public function edit(Penerbit $penerbit)
    {
        //
        return view('admin.penerbit.edit', [
            'author' => $penerbit,
            'title' => 'Edit Penerbit',
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
        $penerbits = Penerbit::onlyTrashed()->get();

        return view('admin.penerbit.trash', compact('penerbits'));
    }

    public function restore(Penerbit $penerbit)
    {
        $penerbit->restore();
        return back();
    }

    public function delete(Penerbit $penerbit)
    {
        $penerbit->forceDelete();
        return back();
    }
}
