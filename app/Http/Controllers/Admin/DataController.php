<?php

namespace App\Http\Controllers\Admin;

use App\Author;
use App\Book;
use App\BorrowHistory;
use App\Category;
use App\Http\Controllers\Controller;
use App\Penerbit;
use App\Rak;
use App\User;
use Illuminate\Http\Request;

class DataController extends Controller
{
    public function authors()
    {
        $authors = Author::orderBy('name', 'ASC');

        return datatables()->of($authors)
            ->addColumn('action', 'admin.author.action')
            ->addIndexColumn()
            ->rawColumns(['action'])
            ->toJson();
    }

    public function categories()
    {
        $categories = Category::orderBy('categories_name', 'ASC');

        return datatables()->of($categories)
            ->addColumn('action', 'admin.category.action')
            ->addIndexColumn()
            ->rawColumns(['action'])
            ->toJson();
    }

    public function penerbit()
    {
        $penerbits = Penerbit::orderBy('nama_penerbit', 'ASC');

        return datatables()->of($penerbits)
            ->addColumn('action', 'admin.penerbit.action')
            ->addIndexColumn()
            ->rawColumns(['action'])
            ->toJson();
    }

    public function rak()
    {
        $raks = Rak::orderBy('nama_rak', 'ASC');

        return datatables()->of($raks)
            ->addColumn('action', 'admin.rak.action')
            ->addIndexColumn()
            ->rawColumns(['action'])
            ->toJson();
    }


    public function books()
    {
        $books = Book::orderBy('title', 'ASC')->get();

        $books->load('author');

        return datatables()->of($books)
                    ->addColumn('author', function(Book $model) {
                        return $model->author->name;
                    })
                    ->editColumn('cover', function(Book $model) {
                        return '<img src="'. $model->getCover() .'" height="150px" >';
                    })
                    ->addColumn('action', 'admin.book.action')
                    ->addIndexColumn()
                    ->rawColumns(['cover', 'action'])
                    ->toJson();
    }

    public function borrows()
    {
        $borrows = BorrowHistory::isBorrowed()->latest()->get();

        $borrows->load('user','book');

        return datatables()->of($borrows)
                    ->addColumn('user', function(BorrowHistory $model) {
                        return $model->user->name;
                    })
                    ->addColumn('book_title', function(BorrowHistory $model) {
                        return $model->book->title;
                    })
                    ->addColumn('action', 'admin.borrow.action')
                    ->addIndexColumn()
                    ->rawColumns(['action'])
                    ->toJson();
    }

    public function historyborrow()
    {
        $history = BorrowHistory::latest()->get();

        $history->load('user','book');

        return datatables()->of($history)
                    ->addColumn('user', function(BorrowHistory $model) {
                        return $model->user->name;
                    })
                    ->addColumn('book_title', function(BorrowHistory $model) {
                        return $model->book->title;
                    })
                    ->addColumn('action', 'admin.borrow.action')
                    ->addIndexColumn()
                    ->rawColumns(['action'])
                    ->toJson();
    }

    public function users()
    {
        $users = User::orderBy('name', 'ASC');

        return datatables()->of($users)
            ->addColumn('action', 'admin.user.action')
            ->addIndexColumn()
            ->rawColumns(['action'])
            ->toJson();
    }

}
