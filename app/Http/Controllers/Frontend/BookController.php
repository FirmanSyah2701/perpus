<?php

namespace App\Http\Controllers\Frontend;

use App\Book;
use App\BorrowHistory;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::paginate(10);
        $title = "Beranda Perpusku";

        return view('frontend.book.index', compact('title', 'books'));
    }

    public function show(Book $book)
    {
        $title = $book->title;
        return view('frontend.book.show', compact('title', 'book'));
    }

    public function borrow(Book $book)
    {
        $user = auth()->user();
        /* if($user->borrow()->book_id) {
            return redirect()
                ->back()
                ->with('toast', 'Gak boleh minjem lebih dari satu sayang! buku dengan judul : ' . $book->title);
        } */

        $user->borrow()->attach($book);
        
        $book->decrement('qty');

        return redirect()->back()->with('toast', 'Berhasil meminjam buku');
    }

    public function search(Request $request){
        $search = $request->search;
        $books = Book::with('author')->whereHas('author', function ($query) use ($search) {
            $query->where('authors.name', 'like', '%'.$search.'%');
        })->get();
        return $books;
    }
}
