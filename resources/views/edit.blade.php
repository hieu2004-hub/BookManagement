@extends('layout')
@section('content')
    <style>
        .container {
            max-width: 450px;
        }
        .push-top {
            margin-top: 50px;
        }
    </style>
    <div class="card push-top">
        <div class="card-header">
            Edit & Update
        </div>
        <div class="card-body">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div><br />
            @endif
            <form method="post" action="{{ route('book.update', $book->id) }}">
                <div class="form-group">
                    @csrf
                    @method('PATCH')
                    <label for="isbn">ISBN</label>
                    <input type="text" class="form-control" name="isbn" value="{{ $book->isbn }}"/>
                </div>
                <div class="form-group">
                    <label for="publisher">Publisher</label>
                    <input type="text" class="form-control" name="publisher" value="{{ $book->publisher }}"/>
                </div>
                <div class="form-group">
                    <label for="numPage">Number of Page</label>
                    <input type="text" class="form-control" name="numPage" value="{{ $book->numPage }}"/>
                </div>
                <div class="form-group">
                    <label for="genre">Genre</label>
                    <input type="text" class="form-control" name="genre" value="{{ $book->genre }}"/>
                </div>
                <div class="form-group">
                    <label for="author">Author</label>
                    <input type="text" class="form-control" name="author" value="{{ $book->author }}"/>
                </div>
                <div class="form-group">
                    <label for="img">Image</label>
                    <input type="text" class="form-control" name="img" value="{{ $book->img }}"/>
                </div>
                <div class="form-group">
                    <label for="price">Price</label>
                    <input type="text" class="form-control" name="price" value="{{ $book->price }}"/>
                </div>
                <button type="submit" class="btn btn-block btn-danger">Update Book</button>
            </form>
        </div>
    </div>
@endsection
