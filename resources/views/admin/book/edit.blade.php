@extends('admin.templates.default')

@section('content')
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Edit Data Buku</h3>
        </div>

        <div class="box-body">
            <form action="{{ route('admin.book.update', $book) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method("PUT")

                <div class="form-group @error('title') has-error @enderror">
                    <label for="">Judul</label>
                    <input type="text" name="title" class="form-control" 
                        value="{{ $book->title ?? old('title') }}"
                    >
                    
                    @error('title')
                        <span class="help-block"> {{ $message }} </span>
                    @enderror
                </div>

                <div class="form-group @error('description') has-error @enderror">
                    <label for="">Deskripsi</label>
                    <textarea name="description" rows="3" 
                        class="form-control"
                    >{{$book->description ?? old('description')}}</textarea>

                    @error('description')
                        <span class="help-block"> {{ $message }} </span>
                    @enderror
                </div>

                <div class="form-group @error('author_id') has-error @enderror">
                    <label for="">Penulis</label>
                    <select name="author_id" class="form-control select2">
                        @foreach ($authors as $author)
                            <option 
                                value="{{ $author->id }}" 
                                @if($author->id === $book->author_id)
                                    selected
                                @endif
                            >
                                {{ $author->name }}
                            </option>
                        @endforeach
                    </select>

                    @error('author_id')
                        <span class="help-block"> {{ $message }} </span>
                    @enderror
                </div>

                <div class="form-group @error('cover') has-error @enderror">
                    <label for="">Sampul</label>
                    <input type="file" name="cover" class="form-control">

                    @error('cover')
                        <span class="help-block"> {{ $message }} </span>
                    @enderror
                </div>

                <div class="form-group @error('qty') has-error @enderror">
                    <label for="">Jumlah</label>
                    <input type="text" name="qty" class="form-control" 
                        placeholder="Masukan jumlah buku" value="{{ $book->qty ?? old('qty') }}"
                    >
                    
                    @error('qty')
                        <span class="help-block"> {{ $message }} </span>
                    @enderror
                </div>

                <div class="form-group">
                    <input type="submit" value="Ubah" class="btn btn-primary">
                </div>
            </form>
        </div>
    </div>
@endsection