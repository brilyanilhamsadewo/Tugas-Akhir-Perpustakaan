<?php

namespace App\Http\Controllers\Admin;

use App\Book;
use App\Http\Controllers\Controller;
use App\Member;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use PDF;


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
        $users = Member::withCount('borrow')
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

    public function generatePDF()

    {
        $data = ['title' => 'Welcome to belajarphp.net'];

        $pdf = PDF::loadView('admin.report.mypdf', $data);
        return $pdf->download('laporan-pdf.pdf');
    }

    public function generatePdfLaporanTopUser()

    {
        $users = Member::withCount('borrow')
            ->orderBy('borrow_count','DESC')
            ->paginate(10);

        $pdf = PDF::loadView('admin.report.laporan-top-user', [
            'users' => $users,
        ]);
        return $pdf->download('laporan-pdf-top-user-global.pdf');
    }

    public function generatePdfLaporanTopBook()

    {
        $books = Book::withCount('borrowed')
        ->orderBy('borrowed_count','DESC')->get();

        $pdf = PDF::loadView('admin.report.laporan-top-book', [
            'books' => $books,
        ]);
        return $pdf->download('laporan-pdf-top-book-global.pdf');
    }
}
