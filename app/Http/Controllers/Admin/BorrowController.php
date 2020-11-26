<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\BorrowHistory;

class BorrowController extends Controller
{
    //
    public function index()
    {
        return view('admin.borrow.index', [
            'title' => 'Data Buku yang dipinjam',
        ]);
    }

    public function returnBook(Request $request, BorrowHistory $borrowHistory)
    {
        $borrowHistory->update([
            'returned_at' => Carbon::now(),
            'admin_id' => auth()->id(),
        ]);

        return redirect()->back()->withSuccess('Buku dikembalikan');
    }
}
