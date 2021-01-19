<?php

namespace App\Http\Controllers\Admin;

use App\Book;
use App\Http\Controllers\Controller;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function topBook()
    {
        $books = Book::withCount('borrowed')
            ->orderBy('borrowed_count','DESC')
            ->paginate(10);

        return view('admin.report.top-book',[
            'books' => $books,
        ]);
    }

    public function topUser()
    {
        $users = User::withCount('borrow')
            ->orderBy('borrow_count','DESC')
            ->paginate(10);

        return view('admin.report.top-user',[
            'users' => $users,
        ]);
    }

    public function returnReport()
    {
        $start = Carbon::now()->startOfMonth()->format('Y-m-d H:i:s');
        $end = Carbon::now()->endOfMonth()->format('Y-m-d H:i:s');

        if (request()->date != '') {
            $date = explode(' - ' ,request()->date);
            $start = Carbon::parse($date[0])->format('Y-m-d') . ' 00:00:01';
            $end = Carbon::parse($date[1])->format('Y-m-d') . ' 23:59:59';
        }

        $books = Book::with(['author'])->whereBetween('created_at', [$start, $end])->get();
        return view('admin.report.return', compact('books'));
    }
    
}
