<?php

namespace App\Http\Controllers\Admin;

use App\Book;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function topBook()
    {
        $books = Book::withCount('borrowed')
                    ->orderBy('borrowed_count', 'desc')
                    ->paginate(env('PAGINATION_ADMIN'));

        return view('admin.report.top-book', compact('books'));
    }

    public function topUser()
    {
        $users = User::withCount('borrow')
                    ->orderBy('borrow_count', 'desc')
                    ->paginate(env('PAGINATION_ADMIN'));

        return view('admin.report.top-user', compact('users'));
    }
}
