@extends('frontend.templates.default')

@section('content')
    <h1 class="title">Koleksi Buku</h1>
    <blockquote>
        <p class="flow-text">Koleksi buku yang bisa kamu baca & pinjam !</p>
    </blockquote>
    <div class="row">
        @foreach ($books as $book)
            @include('frontend.templates.components.card-book', [
                'book'      => $book, 
                'iteration' => $loop->iteration
            ])
            @if($loop->iteration <= 3) 
                @push('preload')
                    <link rel="preload" as="image" href="{{$book->getCover()}}">
                @endpush
            @endif
        @endforeach
    </div>
    
    {{-- Pagination --}}
    {{ $books->links('vendor.pagination.materialize') }}
@endsection