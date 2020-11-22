<?php

namespace App\Http\Controllers\Admin;

use App\Author;
use App\Book;
use App\Http\Controllers\Controller;
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

    public function books()
    {
        $books = Book::orderBy('title', 'ASC')->get();

        $books->load('author');

        return datatables()->of($books)
                    ->addColumn('author', function(Book $model) {
                        return $model->author->name;
                    })
                    ->editColumn('cover', function(Book $model) {
                        return '<img src="'. $model->cover .'" height="150px" >';
                    })
                    ->addColumn('action', 'admin.book.action')
                    ->addIndexColumn()
                    ->rawColumns(['cover', 'action'])
                    ->toJson();
    }
}
