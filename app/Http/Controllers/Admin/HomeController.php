<?php

namespace App\Http\Controllers\Admin;

use App\Author;
use App\Book;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $books = Book::count();
        $users = User::count();
        $authors = Author::count();

        return view('admin.home', compact('books', 'users', 'authors'));
    }
}
