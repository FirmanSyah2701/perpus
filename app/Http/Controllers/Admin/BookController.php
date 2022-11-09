<?php

namespace App\Http\Controllers\Admin;

use App\Book;
use App\Author;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.book.index', ['title' => 'Data Buku']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.book.create', [
            'title'   => 'Tambah Buku',
            'authors' => Author::orderBy('name')->get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title'         => 'required',
            'description'   => 'required|min:20',
            'author_id'     => 'required',
            'cover'         => 'file|image',
            'qty'           => 'required|numeric'
        ]);

        $cover = null;

        if($request->hasFile('cover')){
            $cover = $request->file('cover')->store('assets/covers');
        }

        Book::create([
            'title'         => $request->title,
            'description'   => $request->description,
            'author_id'     => $request->author_id,
            'cover'         => $cover,
            'qty'           => $request->qty
        ]);

        return redirect()
            ->route('admin.book.index')
            ->with('success', 'Data buku berhasil ditambah!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Book $book)
    {
        return view('admin.book.edit', [
            'title'     => 'Ubah Buku',
            'book'      => $book,
            'authors'   => Author::orderBy('name')->get()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Book $book)
    {
        $this->validate($request, [
            'title'         => 'required',
            'description'   => 'required|min:20',
            'author_id'     => 'required',
            'cover'         => 'file|image',
            'qty'           => 'required|numeric'
        ]);

        $cover = $book->cover;

        if($request->hasFile('cover')){
            unlink(public_path($book->cover));
            $cover = $request->file('cover')->store('assets/covers');
        }
        
        $book->update([
            'title'         => $request->title,
            'description'   => $request->description,
            'author_id'     => $request->author_id,
            'cover'         => $cover,
            'qty'           => $request->qty
        ]);

        return redirect()
            ->route('admin.book.index')
            ->with('info', 'Data buku berhasil diperbaharui!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book)
    {
        unlink(public_path($book->cover));
        
        $book->delete();

        return redirect()
            ->route('admin.book.index')
            ->with('danger', 'Data buku berhasil dihapus!');
    }
}
