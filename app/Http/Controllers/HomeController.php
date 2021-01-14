<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $books = auth()->user()->borrow;
        // dd($books);  
        return view('home', [
            'books' => $books,
        ]);
    }

    public function runningborrow()
    {
        // $books = auth()->user()->borrow;
        // return view('runningborrow', [
        //     'books' => $books,
        // ]);
    }

    public function search()
    {
        // $books = auth()->user()->borrow;

        return view('search', [
            // 'books' => $books,
        ]);
    }

    public function requestbuku()
    {
        // $books = auth()->user()->borrow;

        return view('requestbuku', [
            // 'books' => $books,
        ]);
    }
}
