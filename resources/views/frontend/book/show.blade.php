@extends('frontend.templates.default')

@section('content')
    <h4>Detail Buku</h4>
    <div class="row">
        <div class="card horizontal hoverable">
            <div class="card-image">
                <img src="{{ $book->getCover() }}">
            </div>
            <div class="card-stacked">
                <div class="card-content">
                    <h4 class="red-text accent-2"> {{ $book->title }} </h6>
                    <blockquote> {{ $book->description }} </blockquote>
                    <p>
                        <i class="material-icons">person</i> : {{ $book->author->name }}
                    </p>
                    <p>
                        <i class="material-icons">book</i> : {{ $book->qty }}
                    </p>
                </div>
                <div class="card-action">
                    <form action="{{ route('book.borrow', $book) }}" method="POST">
                        @csrf
                        <input type="submit" value="Pinjam Buku" 
                        class="btn orange darken-3 right" @if($book->qty == 0) disabled @endif>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <h5> Buku lainnya dari penulis {{$book->author->name }} ...</h5>
    <div class="row">
        @foreach ($book->author->books->shuffle()->take(4) as $book)
            @include('frontend.templates.components.card-book', [
                'book'      => $book,
                'iteration' => $loop->iteration 
            ])
        @endforeach
    </div>
@endsection