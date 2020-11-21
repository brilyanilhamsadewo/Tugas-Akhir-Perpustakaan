<?php

namespace App\Http\Controllers\Admin;

use App\Author;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DataController extends Controller
{
    public function authors()
    {
        return datatables()->of(Author::query())->toJson();
    }
}
