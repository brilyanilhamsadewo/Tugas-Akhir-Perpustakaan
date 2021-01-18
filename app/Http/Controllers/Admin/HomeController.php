<?php

namespace App\Http\Controllers\Admin;

use App\Author;
use App\Book;
use App\BorrowHistory;
use App\Http\Controllers\Controller;
use App\Member;
use App\PinjamHistori;
use App\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $books = Book::count();
        $users = Member::count();
        $authors = Author::count();
        $borrowhistory = PinjamHistori::count();

        return view('admin.home', compact('books', 'users', 'authors', 'borrowhistory'));
    }
}
