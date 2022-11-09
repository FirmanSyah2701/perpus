<?php

namespace App\Http\Controllers\Admin;

use App\Book;
use App\Author;
use App\BorrowHistory;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DataController extends Controller
{
    public function authors()
    {
        $authors = Author::orderBy('name', 'ASC');

        return datatables()->of($authors)
            ->addColumn('actions', 'admin.author.action')
            ->addIndexColumn()
            ->rawColumns(['actions'])
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
                return '<img src="'. $model->getCover() . '" height="150px">';
            })
            ->addColumn('actions', 'admin.book.action')
            ->addIndexColumn()
            ->rawColumns(['cover', 'actions'])
            ->toJson();
    }

    public function borrows()
    {
        $borrows = BorrowHistory::isBorrowed()->latest()->get();

        $borrows->load('user', 'book');

        return datatables()->of($borrows)
            ->addColumn('user', function(BorrowHistory $model) {
                $model->user->name;
            })
            ->addColumn('book_title', function(BorrowHistory $model) {
                $model->book->title;
            })
            ->addColumn('actions', 'admin.borrow.action')
            ->addIndexColumn()
            ->rawColumns(['actions'])
            ->toJson();
    }
}
