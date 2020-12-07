<?php

use App\Author;
use App\Book;

Route::get('/', 'HomeController@index')->name('dashboard');

// Route::get('/author', 'AuthorController@index')->name('author.index');
// Route::get('/author/create', 'AuthorController@create')->name('author.create');
// Route::post('/author', 'AuthorController@store')->name('author.store');
// Route::get('/author/{author}/edit', 'AuthorController@edit')->name('author.edit');
// Route::put('/author/{author}', 'AuthorController@update')->name('author.update');
// Route::delete('/author/{author}', 'AuthorController@destroy')->name('author.destroy');

Route::get('/author/data', 'DataController@authors')->name('author.data');
Route::get('/category/data', 'DataController@categories')->name('categories.data');
Route::get('/book/data', 'DataController@books')->name('book.data');
Route::get('/borrow/data', 'DataController@borrows')->name('borrow.data');

Route::get('/author/trash','AuthorController@trash')->name('author.trash');
Route::get('/author/restore/{author}','AuthorController@restore')->name('author.restore');
Route::bind('author', function($id) {
    return Author::withTrashed()->find($id);
});
Route::get('/author/delete/{author}','AuthorController@delete')->name('author.delete');
Route::resource('author', 'AuthorController');

Route::get('/book/trash','BookController@trash')->name('book.trash');
Route::get('/book/restore/{book}','BookController@restore')->name('book.restore');
Route::bind('book', function($id) {
    return Book::withTrashed()->find($id);
});
Route::get('/book/delete/{book}','BookController@delete')->name('book.delete');
Route::resource('book', 'BookController');

Route::get('/borrow','BorrowController@index')->name('borrow.index');
Route::get('/borrow/create','BorrowController@create')->name('borrow.create');
Route::post('/borrow/store','BorrowController@store')->name('borrow.store');
Route::put('borrow/{borrowHistory}/return', 'BorrowController@returnBook')->name('borrow.return');

Route::get('/report/top-user','ReportController@topUser')->name('report.top-user');
Route::get('/report/top-book','ReportController@topBook')->name('report.top-book');

Route::resource('category', 'CategoryController');

Route::get('/borrowing','BorrowingController@index')->name('borrowing.index');