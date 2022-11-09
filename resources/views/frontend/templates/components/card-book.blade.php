<div class="col s12 m6">
    <div class="card horizontal hoverable">
        <div class="card-image">
            <img 
                class="cover" 
                alt="{{$book->title}}" 
                @if($iteration > 3) loading="lazy" @endif
                src="{{ $book->getCover() }}"
            >
        </div>
        <div class="card-stacked">
            <div class="card-content">
                {{-- <h6>
                    <a style="color: black" href="{{ route('book.show', $book) }}">
                        {{ Str::limit($book->title, 20) }}
                    </a>
                </h6>
                <p> {{ Str::limit($book->description, 100) }}</p> --}}
                <a style="color: black" href="{{ route('book.show', $book) }}">
                    <span class="book-title"> {{ Str::limit($book->title, 20) }} </span>
                    <p> {{ Str::limit($book->description, 100) }} </p>
                </a>
            </div>
            <div class="card-action">
                <form action="{{ route('book.borrow', $book) }}" method="POST">
                    @csrf
                    <input 
                        type="submit" 
                        value="Pinjam Buku" 
                        class="btn orange darken-3 right" @if($book->qty == 0) disabled @endif
                    >
                </form>
            </div>
        </div>
    </div>
</div>