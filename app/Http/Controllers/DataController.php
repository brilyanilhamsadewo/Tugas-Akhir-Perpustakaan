<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;


class DataController extends Controller
{
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
}
