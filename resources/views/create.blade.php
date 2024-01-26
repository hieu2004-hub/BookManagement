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
            Add User
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
            <form method="post" action="{{ route('book.store') }}">
                <div class="form-group">
                    @csrf
                    <label for="isbn">ISBN</label>
                    <input type="text" class="form-control" name="isbn"/>
                </div>
                <div class="form-group">
                    <label for="publisher">Publisher</label>
                    <input type="text" class="form-control" name="publisher"/>
                </div>
                <div class="form-group">
                    <label for="numPage">Number of Page</label>
                    <input type="text" class="form-control" name="numPage"/>
                </div>
                <div class="form-group">
                    <label for="genre">Genre</label>
                    <input type="text" class="form-control" name="genre"/>
                </div>
                <div class="form-group">
                    <label for="author">Author</label>
                    <input type="text" class="form-control" name="author"/>
                </div>
                <div class="form-group">
                    <label for="img">Image link</label>
                    <input type="text" class="form-control" name="img"/>
                </div>
                <div class="form-group">
                    <label for="price">Price</label>
                    <input type="text" class="form-control" name="price"/>
                </div>
                <button type="submit" class="btn btn-block btn-danger">Add Book</button>
            </form>
        </div>
    </div>
@endsection
