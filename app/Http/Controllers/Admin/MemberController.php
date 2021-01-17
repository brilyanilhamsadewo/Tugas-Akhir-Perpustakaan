<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Member;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.member.index', [
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
        return view('admin.member.create', [
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
            'nis_nip' => 'required|numeric',
            'nama_member' => 'required|min:3',
            'jenis_kelamin' => 'required',
            'no_telp_member' => 'required|numeric|min:3',
            'email_member' => 'required|min:3',
            'alamat_member' => 'required|min:3',
        ]);

        Member::create([
            'nis_nip' => $request->nis_nip,
            'nama_member' => $request->nama_member,
            'jenis_kelamin' => $request->jenis_kelamin,
            'no_telp_member' => $request->no_telp_member,
            'email_member' => $request->email_member,
            'alamat_member' => $request->alamat_member,
        ]);

        return redirect()->route('admin.member.index')->withSuccess('Data Anggota Berhasil Ditambahkan');
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
    public function edit(Member $member)
    {
        return view('admin.member.edit', [
            'member' => $member,
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
    public function update(Request $request, Member $member)
    {
        $this->validate($request, [
            'nis_nip' => 'required',
            'nama_member' => 'required|min:3',
            'no_telp_member' => 'required|numeric|min:3',
            'email_member' => 'required|email|min:3',
            'alamat_member' => 'required|min:3',
            'jenis_kelamin' => 'required',
        ]);

        $member->update([
            'nis_nip' => $request->nis_nip,
            'nama_member' => $request->nama_member,
            'jenis_kelamin' => $request->jenis_kelamin,
            'no_telp_member' => $request->no_telp_member,
            'email_member' => $request->email_member,
            'alamat_member' => $request->alamat_member,
        ]);

        return redirect()->route('admin.member.index')->withSuccess('Data Anggota Berhasil Diperbarui');
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Member $member)
    {
        $member->delete();

        return redirect()->route('admin.member.index')->withDanger('Data anggota berhasil terhapus');
    }

    public function trash()
    {
        $members = Member::onlyTrashed()->get();

        return view('admin.member.trash', compact('members'));
    }

    public function restore(Member $member)
    {
        $member->restore();
        return back();
    }

    public function delete(Member $member)
    {
        $member->forceDelete();
        return back();
    }
}
